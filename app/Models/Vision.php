<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{



    public function patient(){

        return $this->belongsTo('App\Models\PatientDetail');
    }
}
