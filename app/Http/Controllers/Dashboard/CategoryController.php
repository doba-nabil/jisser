<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard.categories.index', compact('categories'));
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
        $category = new Category();
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $category->text_ar = $request->text_ar;
        $category->text_en = $request->text_en;
        if ($request->hasFile('picture')) {
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/categories'), $filename);
            $category->picture = $filename;
        }
        $category->save();
        session()->flash('done', 'تم اضافة التصنيف بنجاح');
        return redirect(route('categories.index'));
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
        $category = Category::find($id);
        return view('dashboard.categories.edit', compact('category'));
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
        $category = Category::find($id);
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $category->text_ar = $request->text_ar;
        $category->text_en = $request->text_en;
        if ($request->hasFile('picture')) {
            @unlink('pictures/categories/' . $category->picture);
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/categories'), $filename);
            $category->picture = $filename;
        }
        $category->save();
        session()->flash('done','تم تعديل بيانات التصنيف بنجاح');
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
        $category = Category::find($id);
        @unlink('pictures/categories/' . $category->picture);
        $category->delete();
        return redirect()->back();
    }
}
