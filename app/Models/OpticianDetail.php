<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpticianDetail extends Model
{
    protected $fillable = [


                'user_id',
                'shop_name',
                'br_number',
                'address',
                'contact_number',
                'contact_number_alternative',
                'latitude',
                'longitude',

    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function product(){

        return $this->hasMany('App\Models\Product');
    }

    public function patients(){

        return $this->hasMany('App\Models\PatientDetail');
    }

}
