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

    Route::Resource('/check-up','CheckUpController');

    Route::Resource('/optician','AdminOpticianController');


    Route::prefix('settings')->group(function () {
        Route::get('/','SettingController@index');
        Route::Resource('/access-control/permissions', 'PermissionsController');
        Route::Resource('/access-control/roles', 'RolesController');
        Route::Resource('/access-control/user-management', 'UserManagementController');
    });

});

