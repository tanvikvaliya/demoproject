<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function product_detail($id){
        $product=Product::with('product_images')->where('id',$id)->first()->toArray();
        //dd($product);
        return view('pages.frontend.product_detail',compact('product'));
    }
}
