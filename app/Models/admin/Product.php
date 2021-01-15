<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    public function product_images()
    {
        return $this->hasMany(Product_images::class,'product_id','id');
    }
    public function product_category()
    {
        return $this->hasOne(Product_category::class,'product_id','id');
    }
}
