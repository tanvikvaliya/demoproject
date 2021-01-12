<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Product_attributes extends Model
{
    public function value()
    {
        return $this->belongsToMany(Product_attribute_values::class,'Product_attributes','product_attribute_id','id');
    }
}
