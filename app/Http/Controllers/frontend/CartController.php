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
        dd($a, Cart::content());
        //dd(Cart::content());
        //return 'success';
    }
    public function listing(){
        dd(Cart::count());
        $cartitem=Cart::content();
       // $img=Product_images::where('product_id',$cartitem['id'])->first();
        //dd($img);
        // foreach($cartitem as $id){
        //     $pro_img=[
        //         Product_images::select('image_name')->where('product_id',$id['id'])->first()->toArray(),
        //     ];
        // }
        dd($cartitem);
        return view('pages.frontend.cart',compact('cartitem','pro_img'));

    }
}
