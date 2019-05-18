<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',function (Request $request){
    $arr = [
        'id'=>1,'username'=>'username', 'success'=>true, 'req'=>$request->all()
    ];
    return $arr;
});

Route::post('/test/myopia',function (Request $request){

    $CheckUp = \App\Models\CheckUp::create([
        'optician_id'=>1,
        'patient_id'=>1,
        'date'=>\Carbon\Carbon::now(),
        'type'=>'Myopia',
        'isMobile'=>true,
        'status'=>'Appointment',
        'note'=>'Created By Opti-care Mobile App'
    ]);

    $Appoinment = \App\Models\Appointment::create([
        'optician_id'=>$CheckUp->optician_id,
        'patient_id'=>$CheckUp->patient_id,
        'check_up_id'=>$CheckUp->id,
    ]);

    return $request->all();
});


Route::get('/user/{id}/optician/locations',function (Request $request){
    $arr = [
        'user'=>[ 'id'=>1, 'name'=>'test user'],
        'opticians'=>[
            ['id'=>1,'name'=>'Cabraal Opticions', 'lat' =>6.902255, 'lng' =>79.916294],
            ['id'=>2,'name'=>'Wickramarachchi Opticians', 'lat' =>6.902255, 'lng' =>79.916294],
            ['id'=>3,'name'=>'Ekanayake Opticians', 'lat' =>6.902255, 'lng' =>79.916294],
        ]
    ];

    return $arr;
});
