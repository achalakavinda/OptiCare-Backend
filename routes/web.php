<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'DashboardController@index');

    Route::Resource('/user','UserController');

    Route::get('/user/{id}/test-summery','TestSummeryController@UserTestSummery');

    Route::get('/user/{id}/check-up','CheckUpController@UserCheckUp'); // done

    Route::get('/user/{id}/appointment','CheckUpController@UserCheckUp'); // under construction

    Route::Resource('/check-up','CheckUpController');

    Route::Resource('/optician','AdminOpticianController');

    Route::Resource('/patient','OpticianPatientController');

    Route::Resource('/product','OpticianProductController');

    Route::Resource('/productType','ProductTypeController');

    Route::Resource('/vision','VisionController');



    Route::prefix('settings')->group(function () {
        Route::get('/','SettingController@index');
        Route::Resource('/access-control/permissions', 'PermissionsController');
        Route::Resource('/access-control/roles', 'RolesController');
        Route::Resource('/access-control/user-management', 'UserManagementController');
    });

});

