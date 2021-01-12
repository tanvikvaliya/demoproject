<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Coupon::all();
        return view('pages.admin.coupon.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.coupon.addcoupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $request->validate(['code'=>'required','percent_off'=>'required','no_of_uses'=>'required']);
        $res=new Coupon;
        $res->code=$request->input('code');
        $res->percent_off=$request->input('percent_off');
        $res->no_of_uses=$request->input('no_of_uses');
        $res->created_by=$userId;
        $res->modified_by=$userId;
        $res->save();
        $request->session()->flash('success','Coupon Added');
        return redirect('coupon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Coupon::find($id);
        return view('pages.admin.coupon.editcoupon',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::id();
        $request->validate(['code'=>'required','percent_off'=>'required','no_of_uses'=>'required']);
        $res=Coupon::find($id);
        $res->code=$request->input('code');
        $res->percent_off=$request->input('percent_off');
        $res->no_of_uses=$request->input('no_of_uses');
        $res->modified_by=$userId;
        $res->save();
        $request->session()->flash('success','Coupon Updated');
        return redirect('coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::destroy(array('id',$id));
        return redirect('coupon')->with(session()->flash('error','Coupon Deleted'));
    }
}
