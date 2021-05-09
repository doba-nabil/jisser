<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Services_package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $service = Service::find($request->service_id);
        return view('dashboard.services.packages.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $service = Service::find($request->service_id);
        return view('dashboard.services.packages.create', compact('service'));
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
            'title_ar' => 'required|string',
            'text_ar' => 'required',
        ]);
        $package = new Services_package();
        $package->service_id = $request->service_id;
        $package->price = $request->price;
        $package->title_ar = $request->title_ar;
        $package->title_en = $request->title_en;
        $package->text_en = $request->text_en;
        $package->text_ar = $request->text_ar;
        $package->days = $request->days;
        $package->order = $request->order;
        $package->save();
        session()->flash('done', 'تم اضافة الباقة بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $package = Services_package::find($id);
        return view('dashboard.services.packages.edit', compact('package'));
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
            'title_ar' => 'required|string',
            'text_ar' => 'required',
        ]);
        $package = Services_package::find($id);
        $package->price = $request->price;
        $package->title_ar = $request->title_ar;
        $package->title_en = $request->title_en;
        $package->text_en = $request->text_en;
        $package->text_ar = $request->text_ar;
        $package->days = $request->days;
        $package->order = $request->order;
        $package->save();
        session()->flash('done', 'تم تعديل الباقة بنجاح');
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
        Services_package::find($id)->delete();
        return redirect()->back();
    }
}
