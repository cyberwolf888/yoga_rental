<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'backend', 'middleware' => 'auth', 'as'=>'backend'], function() {
    Route::get('/', 'Backend\DashboardController@index')->name('.dashboard');

    //kendaraan
    Route::group(['prefix' => 'kendaraan','middleware' => ['role:admin|operator'], 'as'=>'.kendaraan'], function() {
        Route::get('/', 'Backend\KendaraanController@index')->name('.manage');
        Route::get('/create', 'Backend\KendaraanController@create')->name('.create');
        Route::post('/create', 'Backend\KendaraanController@store')->name('.store');
        Route::get('/update/{id}', 'Backend\KendaraanController@edit')->name('.edit');
        Route::post('/update/{id}', 'Backend\KendaraanController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\KendaraanController@show')->name('.detail');
        Route::get('/delete/{id}', 'Backend\KendaraanController@destroy')->name('.delete');
    });

    //service
    Route::group(['prefix' => 'service','middleware' => ['role:admin|operator'], 'as'=>'.service'], function() {
        Route::get('/', 'Backend\ServiceController@index')->name('.manage');
        Route::get('/create/{id}', 'Backend\ServiceController@create')->name('.create');
        Route::post('/create/{id}', 'Backend\ServiceController@store')->name('.store');
        Route::get('/update/{id}', 'Backend\ServiceController@edit')->name('.edit');
        Route::post('/update/{id}', 'Backend\ServiceController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\ServiceController@show')->name('.detail');
        Route::get('/delete/{id}', 'Backend\ServiceController@destroy')->name('.delete');
    });

});