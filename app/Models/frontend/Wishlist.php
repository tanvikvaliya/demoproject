<?php

namespace App\Models\frontend;
use App\Models\admin\Product;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function product_details()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
