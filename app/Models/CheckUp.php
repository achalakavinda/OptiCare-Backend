<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckUp extends Model
{
    public $guarded = ['id'];

    public function patient (){

        return $this->belongsTo('App\Models\PatientDetail');
    }

    public function user () {

        return $this->belongsTo('App\User');
    }
}
