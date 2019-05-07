<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{





    public function product(){

        return $this->belongsTo('App\Models\Product');

    }


    public function optician(){

        return $this->hasOne('App\Models\OpticianDetail');
    }

    public function patient(){

        return $this->hasMany('App\Models\PatientDetail');
    }
    
}
