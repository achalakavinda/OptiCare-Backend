<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = [

        'product_id',
        'front_url',
        'left_side_url',
        'right_side_url',

    ];
}
