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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login',function (Request $request){
    $arr = [
        'id'=>1,'username'=>'username', 'success'=>true, 'req'=>$request->all()
    ];
    return $arr;
});

Route::post('/test/myopia',function (Request $request){
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
