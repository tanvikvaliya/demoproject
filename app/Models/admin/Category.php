<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    public function parentData()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    } 
    public function childData()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    } 
}
