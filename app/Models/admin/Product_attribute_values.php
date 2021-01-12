<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Product_attribute_values extends Model
{
    public function attribute()
    {
        return $this->BelongsTo('Product_attributes','id','product_attribute_id');
    }
}
