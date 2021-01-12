<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    public function product_category()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
