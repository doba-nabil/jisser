<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Sellers_comment;
use Illuminate\Http\Request;

class SellerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('dashboardHome'));
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
        $sellerID = $id;
        $seller = Seller::find($sellerID);
        $comments = Sellers_comment::where('seller_id', $id)->orderBy('id', 'desc')->paginate(20);
        return view('dashboard.sellers.comments.index', compact('seller', 'sellerID', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Sellers_comment::find($id);
        return view('dashboard.sellers.comments.edit', compact('comment'));
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
        $comment = Sellers_comment::find($id);
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
        Sellers_comment::find($id)->delete();
        return response()->json(['status' => 'success'], 201);
    }
}
