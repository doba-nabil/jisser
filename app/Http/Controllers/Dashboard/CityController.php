<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Countries_city;
use App\Models\Country;
use App\Models\Moderator;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Countries_city::orderBy('id', 'desc')->get();
        $countries = Country::all();
        return view('dashboard.cities.index', compact('cities', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('dashboardHome'));
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
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'country_id' => 'required|numeric',
        ]);
        $city = new Countries_city();
        $city->name_ar = $request->name_ar;
        $city->name_en = $request->name_en;
        $city->country_id = $request->country_id;
        $city->save();
        if (isset($request->from_country)) {
            $cities = Countries_city::where('country_id', $request->country_id)->orderBy('id', 'desc')->get();
        } else {
            $cities = Countries_city::orderBy('id', 'desc')->get();
        }
        $html = view('dashboard.cities.loop', compact('cities'))->render();
        return response()->json(compact('html'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return redirect(route('dashboardHome'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = Countries_city::find($id);
        $countries = Country::all();
        return view('dashboard.cities.edit', compact('city', 'countries'));
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
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'country_id' => 'required|numeric',
        ]);
        $city = Countries_city::find($id);
        $city->name_ar = $request->name_ar;
        $city->name_en = $request->name_en;
        $city->country_id = $request->country_id;
        $city->save();
        session()->flash('done','تم تعديل بيانات المدينة بنجاح');
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
        Countries_city::find($id)->delete();
        return response()->json(['status' => 'success'], 201);
    }
}
