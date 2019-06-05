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
        'product_image_id',

    ];

    public function productImage(){

        return $this->hasMany('App\Models\ProductImage');
    }

    public function productType(){

        return $this->belongsTo('App\Models\ProductType');
    }


}
