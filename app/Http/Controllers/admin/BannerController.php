<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Banner::all();
        return view('pages.admin.banner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.banner.addbanner');
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
        $request->validate(['title'=>'required','image'=>'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG']);
        $res=new Banner;
        $res->title=$request->input('title');
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/banner',$filename);
            $res->img = $filename;
        }
        $res->created_by=$userId;
        $res->updated_by=$userId;
        $res->save();
        $request->session()->flash('success','Banner Added');
        return redirect('banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Banner::find($id);
        return view('pages.admin.banner.editbanner',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['title'=>'required']);
        $userId = Auth::id();
        $res=Banner::find($id);
        $res->title=$request->input('title');
        if($request->hasfile('image')){
            $request->validate(['image'=>'mimes:jpeg,png,jpg,JPEG,JPG,PNG']);
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/banner',$filename);
            $res->img = $filename;
        }
        $res->updated_by=$userId;
        $res->save();
        $request->session()->flash('success','Banner Updated');
        return redirect('banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy(array('id',$id));
        return redirect('banner')->with(session()->flash('error','Banner Deleted'));
    }
}
