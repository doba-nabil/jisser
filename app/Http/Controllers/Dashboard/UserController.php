<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Countries_city;
use App\Models\Country;
use App\Models\Moderator;
use App\Models\Rank;
use App\Models\User;
use App\Models\Users_rank;
use App\Models\Users_social;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.users.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ar' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:9',
            'phone' => 'required',
            'picture' => 'image|mimes:jpeg,bmp,png',
        ]);
        $hashedPass = bcrypt($request->password);
        $user = new User;
        $user->name_ar = $request->name_ar;
        $user->name_en = $request->name_en;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $hashedPass;
        $user->isActive = $request->isActive;
        $user->isSeller = $request->isSeller;
        $user->country_id = $request->country_id;
        if ($request->country_id == 0) {
            $user->city_id = 0;
        } else {
            $user->city_id = $request->city_id;
        }
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/users'), $filename);
            $user->picture = $filename;
        }
        $user->save();
        session()->flash('done', 'تم اضافة العضو بنجاح');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('dashboardHome'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $countries = Country::all();
        if ($user->country_id > 0) {
            $cities = Countries_city::where('country_id', $user->country_id)->get();
        } else {
            $cities = Countries_city::all();
        }
        return view('dashboard.users.edit', compact('user', 'countries', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'name_ar' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email|max:255|' . Rule::unique('users')->ignore($user->id),
            'picture' => 'image|mimes:jpeg,bmp,png|max:2000',
        ]);
        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'min:9',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->name_ar = $request->name_ar;
        $user->name_en = $request->name_en;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->isActive = $request->isActive;
        $user->isSeller = $request->isSeller;
        $user->country_id = $request->country_id;
        if ($request->country_id == 0) {
            $user->city_id = 0;
        } else {
            $user->city_id = $request->city_id;
        }
        if ($request->hasFile('picture')) {
            @unlink('pictures/users/' . $user->picture);
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/users'), $filename);
            $user->picture = $filename;
        }
        $user->save();
        session()->flash('done', 'تم تعديل بيانات العضو بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        @unlink('pictures/users/' . $user->picture);
        $user->delete();
        return response()->json(['status' => 'success'], 201);
    }
}
