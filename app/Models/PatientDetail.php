<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{

    protected $fillable = [

        'user_id',
        'address',
        'contact_number',
        'birthday',
        'optician_detail_id',

    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function products (){

        return $this->hasMany('App\Models\Product');
    }

    public function checkup () {

        return $this->belongsTo('App\Models\CheckUp');

    }

}
