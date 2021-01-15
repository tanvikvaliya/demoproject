<?php

namespace App\Http\Controllers\frontend;

use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\Banner;
use App\Models\admin\Product_images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $banner=Banner::all();
       //dd($request->category_id);
        $data=Category::whereNull('parent_id')->get();
        $selectedCategory=$request->category_id;
        foreach($data as $cat){
            $cat->child =Category::where('parent_id',$cat->id)->get()->toArray();
        }
        //$product=Product::with('product_images')->where('quantity','!=','0')->get()->toArray();
        $product=Product::with(['product_images','product_category' => function($q) use($selectedCategory){if(isset($selectedCategory)){ $q->where('category_id',$selectedCategory);} }])
        ->whereHas('product_category', function($q) use($selectedCategory){if(isset($selectedCategory)){ $q->where('category_id',$selectedCategory);} })->where('quantity','!=','0')->get()->toArray();
        //dd($product);
        $data=$data->toArray();
       // dd($banner);
        return view('pages.frontend.index',compact('data','product','banner'));
    }
    public function contact(){
        return view('pages.frontend.contact_us');
    }
    
    public function siteerror(){
        return view('pages.frontend.404');
    }
    public function blog(){
        return view('pages.frontend.blog');
    }
    public function blogsingle(){
        return view('pages.frontend.blogsingle');
    }
    public function checkout(){
        return view('pages.frontend.checkout');
    }
}
