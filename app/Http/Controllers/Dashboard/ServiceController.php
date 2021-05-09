<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categories_segment;
use App\Models\Categories_subcategory;
use App\Models\Category;
use App\Models\Seller;
use App\Models\Service;
use App\Models\Services_image;
use App\Models\Services_tag;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('isService', 1)->orderBy('id', 'desc')->paginate(20);
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sellers = Seller::all();
        return view('dashboard.services.create', compact('categories', 'sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required|string|max:255',
            'text_ar' => 'required',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'segment_id' => 'required|numeric',
            'seller_id' => 'required|numeric',
            'picture' => 'required|image|mimes:jpeg,bmp,png',
            'video' => 'mimes:mp4',
        ]);
        $seller = Seller::find($request->seller_id);
        $service = new Service();
        $service->seller_id = $seller->id;
        $service->user_id = $seller->user->id ?? 0;
        $service->title_ar = $request->title_ar;
        $service->title_en = $request->title_en;
        $service->text_ar = $request->text_ar;
        $service->text_en = $request->text_en;
        $service->category_id = $request->category_id;
        $service->subcategory_id = $request->subcategory_id;
        $service->segment_id = $request->segment_id;
        $service->isActive = $request->isActive;
        $service->isService = $request->isService;
        if ($request->isService == 0) {
            $service->price = $request->price;
        }
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/services'), $filename);
            $service->picture = $filename;
        }
        if ($request->hasFile('video')) {
            $filename = time() . '-' . $request->video->getClientOriginalName();
            $request->video->move(public_path('videos/services'), $filename);
            $service->video = $filename;
        }
        $service->save();
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $filename = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('pictures/services'), $filename);
                $image = new Services_image();
                $image->service_id = $service->id;
                $image->picture = $filename;
                $image->save();
            }
        }
        if ($request->tags_ar != '') {
            $arabicTags = explode('-', $request->tags_ar);
            foreach ($arabicTags as $arabicTag) {
                $newArabicTag = new Services_tag();
                $newArabicTag->language = 'ar';
                $newArabicTag->service_id = $service->id;
                $newArabicTag->name = trim($arabicTag);
                $newArabicTag->save();
            }
        }
        if ($request->tags_en != '') {
            $englishTags = explode('-', $request->tags_en);
            foreach ($englishTags as $englishTag) {
                $newEnglishTag = new Services_tag();
                $newEnglishTag->language = 'en';
                $newEnglishTag->service_id = $service->id;
                $newEnglishTag->name = trim($englishTag);
                $newEnglishTag->save();
            }
        }
        session()->flash('done', 'تم اضافة الخدمة بنجاح');
        return redirect(route('services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('dashboard.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $categories = Category::all();
        $subcategories = Categories_subcategory::where('category_id', $service->category_id)->get();
        $segments = Categories_segment::where('subcategory_id', $service->subcategory_id)->get();
        return view('dashboard.services.edit', compact('categories', 'service', 'subcategories', 'segments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required|string|max:255',
            'text_ar' => 'required',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'segment_id' => 'required|numeric',
            'picture' => 'image|mimes:jpeg,bmp,png',
            'video' => 'mimes:mp4',
        ]);
        $service = Service::find($id);
        $service->title_ar = $request->title_ar;
        $service->title_en = $request->title_en;
        $service->text_ar = $request->text_ar;
        $service->text_en = $request->text_en;
        $service->category_id = $request->category_id;
        $service->subcategory_id = $request->subcategory_id;
        $service->segment_id = $request->segment_id;
        $service->isActive = $request->isActive;
        if ($service->isService == 0) {
            $service->price = $request->price;
        }
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/services'), $filename);
            $service->picture = $filename;
        }
        if ($request->hasFile('video')) {
            $filename = time() . '-' . $request->video->getClientOriginalName();
            $request->video->move(public_path('videos/services'), $filename);
            $service->video = $filename;
        }
        $service->save();
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $filename = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('pictures/services'), $filename);
                $image = new Services_image();
                $image->service_id = $service->id;
                $image->picture = $filename;
                $image->save();
            }
        }
        if ($request->tags_ar != '') {
            $arabicTags = explode('-', $request->tags_ar);
            foreach ($arabicTags as $arabicTag) {
                $newArabicTag = new Services_tag();
                $newArabicTag->language = 'ar';
                $newArabicTag->service_id = $service->id;
                $newArabicTag->name = trim($arabicTag);
                $newArabicTag->save();
            }
        }
        if ($request->tags_en != '') {
            $englishTags = explode('-', $request->tags_en);
            foreach ($englishTags as $englishTag) {
                $newEnglishTag = new Services_tag();
                $newEnglishTag->language = 'en';
                $newEnglishTag->service_id = $service->id;
                $newEnglishTag->name = trim($englishTag);
                $newEnglishTag->save();
            }
        }
        session()->flash('done', 'تم تعديل الخدمة بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        @unlink('pictures/services/' . $service->picture);
        @unlink('videos/services/' . $service->video);
        foreach ($service->images as $image) {
            @unlink('pictures/services/' . $image->picture);
        }
        $service->delete();
        return redirect()->back();
    }

    public function requests()
    {
        $services = Service::where('isService', 0)->orderBy('id', 'desc')->paginate(20);
        $request = 1;
        return view('dashboard.services.index', compact('services', 'request'));
    }
}
