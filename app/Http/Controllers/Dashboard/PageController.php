<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->paginate(20);
        return view('dashboard.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
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
            'title_ar' => 'required',
            'text_ar' => 'required',
            'picture' => 'image|mimes:jpeg,bmp,png',
        ]);
        $page = new Page();
        $page->title_ar = $request->title_ar;
        $page->title_en = $request->title_en;
        $page->text_ar = $request->text_ar;
        $page->text_en = $request->text_en;
        if ($request->hasFile('picture')){
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/pages'), $filename);
            $page->picture = $filename;
        }
        $page->save();
        session()->flash('done','تم اضافة الصفحة بنجاح');
        return redirect(route('pages.index'));
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
        $page = Page::find($id);
        return view('dashboard.pages.edit', compact('page'));
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
            'title_ar' => 'required',
            'text_ar' => 'required',
            'picture' => 'image|mimes:jpeg,bmp,png',
        ]);
        $page = Page::find($id);
        $page->title_ar = $request->title_ar;
        $page->title_en = $request->title_en;
        $page->text_ar = $request->text_ar;
        $page->text_en = $request->text_en;
        if ($request->hasFile('picture')){
            @unlink('pictures/pages/' . $page->picture);
            $filename = time() . '-' . $request->picture->getClientOriginalName();
            $request->picture->move(public_path('pictures/pages'), $filename);
            $page->picture = $filename;
        }
        $page->save();
        session()->flash('done','تم تعديل بيانات الصفحة بنجاح');
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
        $page = Page::find($id);
        @unlink('pictures/pages/' . $page->picture);
        $page->delete();
        return response()->json(['status' => 'success'], 201);
    }
}
