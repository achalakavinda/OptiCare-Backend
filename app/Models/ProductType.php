<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = [

        'user_id',
        'name',


    ];

    public function optician(){

        return $this->hasMany('App\User');
    }
}
