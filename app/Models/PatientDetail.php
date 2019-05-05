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

    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

}
