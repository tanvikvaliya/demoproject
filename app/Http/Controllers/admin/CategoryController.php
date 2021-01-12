<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::with(['parentData'])->get()->toArray();
        return view('pages.admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::with(['parentData'])->get()->toArray();
        return view('pages.admin.category.addcat',compact('data'));
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
       // $request->validate(['name'=>'required','status'=>'required']);
        $res=new Category;
        $res->name=$request->input('name');
        $res->status=$request->input('status');
        $res->parent_id=$request->input('parent_id');
        $res->created_by=$userId;
        $res->updated_by=$userId;
        $res->save();
        $request->session()->flash('success','Category Added');
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Category::find($id);
        $alldata=Category::with(['parentData'])->get()->toArray();
        return view('pages.admin.category.editcat',compact('data','alldata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required','status'=>'required']);
        $data=Category::find($id);
        $userId = Auth::id();
        $data->name=$request->input('name');
        $data->status=$request->input('status');
        $data->updated_by=$userId;
        $data->parent_id=$request->input('parent_id');
        $data->save();
        $request->session()->flash('success','Category Updated');
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy(array('id',$id));
        return redirect('category')->with(session()->flash('error','Category Deleted'));
    }
}
