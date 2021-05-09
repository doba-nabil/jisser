<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categories_subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.subcategories.index', compact('categories'));
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
        $subcategory = new Categories_subcategory();
        $subcategory->name_ar = $request->name_ar;
        $subcategory->name_en = $request->name_en;
        $subcategory->category_id = $request->category_id;
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/subcategories'), $filename);
            $subcategory->picture = $filename;
        }
        $subcategory->save();
        session()->flash('done', 'تم اضافة التصنيف الفرعي بنجاح');
        return redirect(route('subcategories.index'));
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
        $subcategory = Categories_subcategory::find($id);
        $categories = Category::all();
        return view('dashboard.categories.subcategories.edit', compact('subcategory', 'categories'));
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
        $subcategory = Categories_subcategory::find($id);
        $subcategory->name_ar = $request->name_ar;
        $subcategory->name_en = $request->name_en;
        $subcategory->category_id = $request->category_id;
        if ($request->hasFile('picture')) {
            @unlink('pictures/subcategories/' . $subcategory->picture);
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/subcategories'), $filename);
            $subcategory->picture = $filename;
        }
        $subcategory->save();
        session()->flash('done','تم تعديل بيانات التصنيف الفرعي بنجاح');
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
        $subcategory = Categories_subcategory::find($id);
        @unlink('pictures/subcategories/' . $subcategory->picture);
        $subcategory->delete();
        return redirect()->back();
    }
}
