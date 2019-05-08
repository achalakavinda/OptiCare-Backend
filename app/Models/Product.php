<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'product_name',
        'description',
        'otherInfo',

    ];

    public function productImage(){

        return $this->belongsTo('App\Models\ProductImage');
    }

    public function productType(){

        return $this->belongsTo('App\Models\ProductType');
    }


}
