<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categories_segment;
use App\Models\Categories_subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    public function index()
    {
        $subcategories = Categories_subcategory::all();
        $categories = Category::all();
        return view('dashboard.categories.segments.index', compact('subcategories', 'categories'));
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
            'picture' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);
        $segment = new Categories_segment();
        $segment->name_ar = $request->name_ar;
        $segment->name_en = $request->name_en;
        $segment->subcategory_id = $request->subcategory_id;
        $segment->category_id = Categories_subcategory::find($request->subcategory_id)->category->id ?? 0;
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/segments'), $filename);
            $segment->picture = $filename;
        }
        $segment->save();
        session()->flash('done', 'تم اضافة التقسيم بنجاح');
        return redirect(route('segments.index'));
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
        $subcategories = Categories_subcategory::all();
        $segment = Categories_segment::find($id);
        return view('dashboard.categories.segments.edit', compact('subcategories', 'segment'));
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
            'picture' => 'image|mimes:jpeg,bmp,png',
        ]);
        $segment = Categories_segment::find($id);
        $segment->name_ar = $request->name_ar;
        $segment->name_en = $request->name_en;
        $segment->subcategory_id = $request->subcategory_id;
        $segment->category_id = Categories_subcategory::find($request->subcategory_id)->category->id ?? 0;
        if ($request->hasFile('picture')) {
            @unlink('pictures/segments/' . $segment->picture);
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/segments'), $filename);
            $segment->picture = $filename;
        }
        $segment->save();
        session()->flash('done','تم تعديل بيانات التقسيم بنجاح');
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
        $segment = Categories_segment::find($id);
        @unlink('pictures/segments/' . $segment->picture);
        $segment->delete();
        return redirect()->back();
    }
}
