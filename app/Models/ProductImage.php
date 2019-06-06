<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    protected $uploads = '/images/';


    protected $fillable = [
        'product_id',
        'image',
    ];


    public function products(){

        return $this->hasMany('App\Model\Product');
    }

}
