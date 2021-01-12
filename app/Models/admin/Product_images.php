<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    protected $table = 'product_images';
    public function product()
    {
        return $this->BelongsTo('Product','id','product_id');
    }
}
