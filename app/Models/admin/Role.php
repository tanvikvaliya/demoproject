<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'roles';
    public function users()
    {
        return $this->belongsToMany('App\Models\admin\user');
    }
}
