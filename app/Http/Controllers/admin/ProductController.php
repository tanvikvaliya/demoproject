<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Product;
use App\Models\admin\Category;
use App\Models\admin\Product_category;
use App\Models\admin\Product_attributes_assoc;
use App\Models\admin\Product_attributes;
use App\Models\admin\Product_attribute_values;
use App\Models\admin\Product_images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::all();
        return view('pages.admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::wherenull('parent_id')->get()->toArray();
        $data=Product_attributes::all();
        return view('pages.admin.product.addproduct',compact('data','cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(['name'=>'required','att_id'=>'required','att_value_id'=>'required',
        'cat_id'=>'required','image'=>'required','shortdsc'=>'required','longdsc'=>'required'
        ,'price'=>'required','sprice'=>'required','datefrom'=>'required','dateto'=>'required'
        ,'status'=>'required','qty'=>'required']);
        $res=new Product;
        $pcat=new Product_category;
        $userId = Auth::id();
        $res->name=$request->input('name');
        $res->sku=rand(1000,100000);
        $res->short_description=$request->input('shortdsc');
        $res->long_description=$request->input('longdsc');
        $res->price=$request->input('price');
        $res->special_price=$request->input('sprice');
        $res->special_price_from=date('Y-m-d', strtotime($request->input('datefrom')));
        $res->special_price_to=date('Y-m-d', strtotime($request->input('dateto')));
        $res->status=$request->input('status');
        $res->quantity=$request->input('qty');
        $res->created_by=$userId;
        $res->modified_by=$userId;
        $res->save();
        $catid=$request->input('cat_id');
        $sub_id=$request->input('cat_value_id');
        $fimage=[];
        $avalues=[];
        $images = $request->file('image');
        $attid = $request->input('att_id');
        $attvalue = $request->input('att_value_id');
        foreach($images as $image){
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('images',$new_name);
            $fimage[]=[
                'image_name'=>$new_name,
                'created_by'=>$userId,
                'modified_by'=>$userId,
                'product_id' =>$res->id,
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ];
        }
        if(!$attid){
            for($i = 0; $i < count($attid); $i++) {
                $avalues[]=[
                    'product_id'=>$res->id,
                    'product_attribute_id'=>$attid[$i],
                    'product_attribute_value_id'=>$attvalue[$i],
                ];
              }
        }
        
        if(!empty($fimage)){
            Product_images::insert($fimage);
        } 
        if(!empty($avalues)){
            Product_attributes_assoc::insert($avalues);
        }
        if(!empty($sub_id)){
            $pcat->product_id=$res->id;
            $pcat->category_id=$sub_id;
            $pcat->save();
        }
        else{
            $pcat->product_id=$res->id;
            $pcat->category_id=$catid;
            $pcat->save();
        }
        $request->session()->flash('success','Product Added');
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Category::wherenull('parent_id')->get()->toArray();
        $data=Product::with('product_category')->find($id)->toArray();
        //dd($data);
        $attArr=Product_attributes_assoc::select('id','product_attribute_id','product_attribute_value_id')->where('product_id',$id)->get()->toArray();
        $valueArr=Product_attributes::all();
        $attvalue=Product_attribute_values::all();
        $temp=[];
        foreach($attvalue as $att){
            $temp[$att['product_attribute_id']][]=$att;
        }
       
        return view('pages.admin.product.editproduct',compact('data','valueArr','attArr','temp','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request->input());
        $res=Product::find($id);
        $pcat=new Product_category;
        $userId = Auth::id();
        $res->name=$request->input('name');
        $res->short_description=$request->input('shortdsc');
        $res->long_description=$request->input('longdsc');
        $res->price=$request->input('price');
        $res->special_price=$request->input('sprice');
        if($request->input('datefrom')!=null){
            $res->special_price_from=date('Y-m-d', strtotime($request->input('datefrom')));
        }
        if($request->input('dateto')!=null){
            $res->special_price_to=date('Y-m-d', strtotime($request->input('dateto')));
        }
        $res->status=$request->input('status');
        $res->quantity=$request->input('qty');
        $res->modified_by=$userId;
        $res->save();
        $catid=$request->input('cat_id');
        $sub_id=$request->input('cat_value_id');
        $avalues=[];
        $attid = $request->input('att_id');
        $attvalue = $request->input('att_value_id');
        if($attid != null){
            for($i = 0; $i < count($attid); $i++) {
                $avalues[]=[
                    'product_attribute_id'=>$attid[$i],
                    'product_attribute_value_id'=>$attvalue[$i],
                ];
             }
        }
          if(!empty($avalues)){
            Product_attributes_assoc::destroy(array('product_id',$id));
            Product_attributes_assoc::insert($avalues);
        }
        if(!empty($sub_id)){
            Product_category::where('product_id', $id)->update([
                'category_id' => $sub_id
             ]);
        }
        else{
            Product_category::where('product_id', $id)->update([
                'category_id' => $catid
             ]);
        }
        $request->session()->flash('success','Product Updated');
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy(array('id',$id));
        Product_images::where('product_id',$id)->delete();
        return redirect('product')->with(session()->flash('error','Product Deleted'));
    }
}
