<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Services_comment;
use Illuminate\Http\Request;

class ServiceCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Services_comment::orderBy('id', 'desc')->paginate(20);
        return view('dashboard.services.comments.index', compact('comments'));
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
        return redirect(route('dashboardHome'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceID = $id;
        $service = Service::find($serviceID);
        $comments = Services_comment::where('service_id', $id)->orderBy('id', 'desc')->paginate(20);
        return view('dashboard.services.comments.index', compact('service', 'serviceID', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Services_comment::find($id);
        return view('dashboard.services.comments.edit', compact('comment'));
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
        $comment = Services_comment::find($id);
        $comment->isActive = $request->isActive;
        $comment->text = $request->text;
        $comment->save();
        session()->flash('done', 'تم تحديث التعليق بنجاح!');
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
        Services_comment::find($id)->delete();
        return response()->json(['status' => 'success'], 201);
    }
}
