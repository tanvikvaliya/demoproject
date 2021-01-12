<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Product_attributes;
use App\Models\admin\Category;
use App\Models\admin\Product_attribute_values;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product_attributes::all();
        return view('pages.admin.product.product_attributes',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.product.addproductattribute');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required','value'=>'required']);
        $res=new Product_attributes;
        $userId = Auth::id();
        $res->name=$request->input('name');
        $res->created_by=$userId;
        $res->modified_by=$userId;
        $res->save();
        $nvalue=[];
        $svalue = $request->input('value');
        foreach($svalue as $pvalue){
            $nvalue[]=[
                'attribute_value'=>$pvalue,
                'created_by'=>$userId,
                'modified_by'=>$userId,
                'product_attribute_id' =>$res->id,
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ];
        }
        if(!empty($nvalue)){
            Product_attribute_values::where('product_attribute_id',$res->id)->delete();
            Product_attribute_values::insert($nvalue);
        }
        $request->session()->flash('success','Product Attribute Added');
        return redirect('product_attributes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_attributes  $product_attributes
     * @return \Illuminate\Http\Response
     */
    public function show(Product_attributes $product_attributes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_attributes  $product_attributes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Product_attributes::find($id);
        $attArr=Product_attribute_values::all();
        return view('pages.admin.product.editproductattribute',compact('data','attArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_attributes  $product_attributes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required']);
        $res=Product_attributes::find($id);
        $userId = Auth::id();
        $res->name=$request->input('name');
        $res->modified_by=$userId;
        $res->save();
        $nvalue=[];
        $svalue = $request->input('value');

        foreach($svalue as $pvalue){
            $nvalue[]=[
                'attribute_value'=>$pvalue,
                'modified_by'=>$userId,
                'product_attribute_id' =>$res->id,
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ];
        }
        if(!empty($nvalue)){
            Product_attribute_values::insert($nvalue);
        }
        $request->session()->flash('success','Product Attribute Updated');
        return redirect('product_attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_attributes  $product_attributes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product_attributes::destroy('id',$id);
        Product_attribute_values::where('product_attribute_id',$id)->delete();
        return redirect('product_attributes')->with(session()->flash('error','Product Attribute Deleted'));
    }
    public function getvalue(Request $request)
    {
        $id=$request->id;
        $vdata=Product_attribute_values::select('id','attribute_value')->where('product_attribute_id',$id)->get()->toArray();
        return $vdata;
    }
    public function getcat(Request $request)
    {
        $id=$request->id;
        $vdata=Category::select('id','name')->where('parent_id',$id)->get()->toArray();
        return $vdata;
    }
}
