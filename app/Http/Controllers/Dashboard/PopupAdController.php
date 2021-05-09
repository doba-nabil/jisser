<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Models\PopupAd;
use Illuminate\Http\Request;

class PopupAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $ad = PopupAd::find(1);
            return view('dashboard.popupad.edit', compact('ad'));
        }catch (\Exception $e){
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $ad = PopupAd::find(1);
            return view('dashboard.popupad.edit', compact('ad'));
        }catch (\Exception $e){
            return redirect()->back();
        }
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
            'picture_ar' => 'image|mimes:jpeg,bmp,png',
            'picture_en' => 'image|mimes:jpeg,bmp,png',
            'link' => 'string',
        ]);
        $ad = PopupAd::find(1);
        $ad->link = $request->link;
        $ad->active = $request->active;
        if ($request->hasFile('picture_ar')){
            @unlink('pictures/pop_ads/' . $ad->picture_ar);
            $filename = time() . '-' . $request->picture_ar->getClientOriginalName();
            $request->picture_ar->move(public_path('pictures/pop_ads'), $filename);
            $ad->picture_ar = $filename;
        }
        if ($request->hasFile('picture_en')){
            @unlink('pictures/pop_ads/' . $ad->picture_en);
            $filename = time() . '-' . $request->picture_en->getClientOriginalName();
            $request->picture_en->move(public_path('pictures/pop_ads'), $filename);
            $ad->picture_en = $filename;
        }
        $ad->save();
        session()->flash('done','تم تعديل البانر الاعلاني بنجاح');
        return redirect(route('popupad.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
