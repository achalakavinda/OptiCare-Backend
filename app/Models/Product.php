<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'user_id',
        'patient_detail_id',
        'vision_id',
        'product_type_id',
        'name',
        'description',

    ];

    public function productImage(){

        return $this->belongsToMany('App\Models\ProductImage');
    }

    public function productType(){

        return $this->belongsTo('App\Models\ProductType');
    }


}
