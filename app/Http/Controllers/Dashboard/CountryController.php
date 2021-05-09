<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Countries_city;
use App\Models\Country;
use App\Models\Moderator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('id', 'desc')->get();
        return view('dashboard.countries.index', compact('countries'));
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
            'currency_ar' => 'required|string',
            'currency_en' => 'required|string',
        ]);
        $country = new Country();
        $country->name_ar = $request->name_ar;
        $country->name_en = $request->name_en;
        $country->name_code = $request->name_code;
        $country->code = $request->code;
        $country->number = $request->number;
        $country->start_number = $request->start_number;
        $country->currency_en = $request->currency_en;
        $country->currency_ar = $request->currency_ar;
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/countries'), $filename);
            $country->picture = $filename;
        }
        $country->save();
        $countries = Country::orderBy('id', 'desc')->get();
        $html = view('dashboard.countries.loop', compact('countries'))->render();
        return response()->json(compact('html'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cities = Countries_city::where('country_id', $id)->orderBy('id', 'desc')->get();
        $country = Country::find($id);
        return view('dashboard.countries.cities', compact('cities', 'country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        return view('dashboard.countries.edit', compact('country'));
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
            'currency_ar' => 'required|string',
            'currency_en' => 'required|string',
        ]);
        $country = Country::find($id);
        $country->name_ar = $request->name_ar;
        $country->name_en = $request->name_en;
        $country->name_code = $request->name_code;
        $country->code = $request->code;
        $country->number = $request->number;
        $country->start_number = $request->start_number;
        $country->currency_ar = $request->currency_ar;
        $country->currency_en = $request->currency_en;
        if ($request->hasFile('picture')) {
            @unlink('pictures/countries/' . $country->picture);
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/countries'), $filename);
            $country->picture = $filename;
        }
        $country->save();
        session()->flash('done','تم تعديل بيانات الدولة بنجاح');
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
        $country = Country::find($id);
        @unlink('pictures/countries/' . $country->picture);
        $country->delete();
        return response()->json(['status' => 'success'], 201);
    }
}
