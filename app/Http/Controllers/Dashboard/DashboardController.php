<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categories_segment;
use App\Models\Categories_subcategory;
use App\Models\Countries_city;
use App\Models\Option;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Service;
use App\Models\Services_image;
use App\Models\Services_tag;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class DashboardController extends Controller
{
    public function home()
    {
        $userData = User::where('isSeller' , 0)->select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
        $sellerData = User::where('isSeller' , 1)->select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
        $serviceData = Service::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
        $shownOrders = Order::where('isSeen' , 1)->count();
        $unshownOrders = Order::where('isSeen' , 0)->count();
        $orders = Order::count();
        return view('dashboard.home',compact('userData','serviceData','sellerData','unshownOrders',
            'shownOrders','orders'));
    }

    public function fronendHome()
    {
        return redirect(route('dashboardHome'));
    }

    public function getCities()
    {
        $country_id = \Illuminate\Support\Facades\Request::get('country_id');
        $cities = Countries_city::where('country_id', $country_id)->get();
        return Response::json($cities);
    }

    public function getSubcategories()
    {
        $category_id = \Illuminate\Support\Facades\Request::get('category_id');
        $subcategories = Categories_subcategory::where('category_id', $category_id)->get();
        return Response::json($subcategories);
    }

    public function getSegments()
    {
        $subcategory_id = \Illuminate\Support\Facades\Request::get('subcategory_id');
        $segments = Categories_segment::where('subcategory_id', $subcategory_id)->get();
        return Response::json($segments);
    }

    public function deleteID($type, $id)
    {
        if ($type == 0) {
            $image = Services_image::find($id);
            @unlink('pictures/services/' . $image->picture);
            $image->delete();
        } elseif ($type == 1) {
            $service = Service::find($id);
            @unlink('videos/services/' . $service->video);
            $service->video = null;
            $service->save();
        } elseif ($type == 2) {
            $tag = Services_tag::find($id);
            $tag->delete();
        }
        return redirect()->back();
    }

    public function options()
    {
        return view('dashboard.options');
    }

    public function optionsSave(Request $request)
    {
        $this->validate($request, [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'text_ar' => 'required',
            'text_en' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'rights' => 'required',
            'percent' => 'required',
            'picture' => 'image|mimes:jpeg,bmp,png',
            'i_icon' => 'image|mimes:jpeg,bmp,png',
            'video' => 'mimes:mp4,gif',
        ]);
        $option = Option::find(1);
        $option->name_ar = $request->name_ar;
        $option->name_en = $request->name_en;
        $option->text_ar = $request->text_ar;
        $option->text_en = $request->text_en;
        $option->email = $request->email;
        $option->phone = $request->phone;
        $option->address = $request->address;
        $option->rights = $request->rights;
        $option->percent = $request->percent;
        if ($request->hasFile('logo')){
            @unlink('pictures/options/' . $option->logo);
            $filename = time() . '-' . $request->logo->getClientOriginalName();
            $request->logo->move(public_path('pictures/options'), $filename);
            $option->logo = $filename;
        }
        if ($request->hasFile('i_icon')){
            @unlink('pictures/options/' . $option->i_icon);
            $filename = time() . '-' . $request->i_icon->getClientOriginalName();
            $request->i_icon->move(public_path('pictures/options'), $filename);
            $option->i_icon = $filename;
        }
        if ($request->hasFile('video')) {
            @unlink('videos/options/' . $option->intro_video);
            $filename = time() . '-' . $request->video->getClientOriginalName();
            $request->video->move(public_path('videos/options'), $filename);
            $option->intro_video = $filename;
        }
        $option->save();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $word = $request->word;
        $users = User::where('name_ar', 'LIKE', "%$word%")->orWhere('name_en', 'LIKE', "%$word%")->orWhere('email', 'LIKE', "%$word%")->orWhere('phone', $request->word)->get();
        $services = Service::where('title_ar', 'LIKE', "%$word%")->orWhere('title_en', 'LIKE', "%$word%")->get();
        $sellers = Seller::where('first_name_ar', 'LIKE', "%$word%")->orWhere('last_name_ar', 'LIKE', "%$word%")->orWhere('first_name_en', 'LIKE', "%$word%")->orWhere('last_name_en', 'LIKE', "%$word%")->get();
        return view('dashboard.search', compact('users', 'sellers', 'services', 'word'));
    }

    public static function formatText($string, $line_breaks = true, $xml = true)
    {
        $string = str_replace(['<p>',
            '</p>',
            '<br>',
            '<br />'], '', $string);
        if ($line_breaks == true) {
            return '<p>' . preg_replace(["/([\n]{2,})/i",
                    "/([^>])\n([^<])/i"], ["</p>\n<p>",
                    '$1<br' . ($xml == true ? ' /' : '') . '>$2'], trim($string)) . '</p>';
        } else {
            return '<p>' . preg_replace(["/([\n]{2,})/i",
                    "/([\r\n]{3,})/i",
                    "/([^>])\n([^<])/i"], ["</p>\n<p>",
                    "</p>\n<p>",
                    '$1<br' . ($xml == true ? ' /' : '') . '>$2'], trim($string)) . '</p>';
        }
    }
}
