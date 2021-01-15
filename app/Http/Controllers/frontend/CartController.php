<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\admin\Product_images;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function getpro(Request $request)
    {
        $id=$request->id;
        $qty=$request->qty;
        $data=Product::find($id)->toArray();
        //dd($data);
        $a = Cart::add($data['id'], $data['name'], $qty, $data['price']);
        //dd(Cart::content());
        //return 'success';
    }
    public function listing(){
        $cartitem=Cart::content()->toArray();
        $i=0;
        $totaltax=0;
        $total=0;
        $pro_img=[];
        //dd(!empty($cartitem));
        if(!empty($cartitem)){
            foreach($cartitem as $id){
                $pro_img=[
                     Product_images::select('image_name')->where('product_id',$id['id'])->first()->toArray(),
             ];
            $i=$i+$id['subtotal'];
            $totaltax=$totaltax + $id['tax'];
            }
            $total=Cart::total();
        
            
        }
        return view('pages.frontend.cart',compact('cartitem','pro_img','total','i','totaltax'));
    }
    public function remove(Request $request){
        $rowId=$request->id;
        Cart::remove($rowId);
        return view('pages.frontend.cart');
    }
}
