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


Route::auth();

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'backend', 'middleware' => 'auth', 'as'=>'backend'], function() {
    Route::get('/', 'Backend\DashboardController@index')->name('.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Kendaraan Web Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'kendaraan','middleware' => ['role:admin|operator'], 'as'=>'.kendaraan'], function() {
        Route::get('/', 'Backend\KendaraanController@index')->name('.manage');
        Route::get('/create', 'Backend\KendaraanController@create')->name('.create');
        Route::post('/create', 'Backend\KendaraanController@store')->name('.store');
        Route::get('/update/{id}', 'Backend\KendaraanController@edit')->name('.edit');
        Route::post('/update/{id}', 'Backend\KendaraanController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\KendaraanController@show')->name('.detail');
    });

    /*
    |--------------------------------------------------------------------------
    | Service Web Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'service','middleware' => ['role:admin|operator'], 'as'=>'.service'], function() {
        Route::get('/', 'Backend\ServiceController@index')->name('.manage');
        Route::get('/create/{id}', 'Backend\ServiceController@create')->name('.create');
        Route::post('/create/{id}', 'Backend\ServiceController@store')->name('.store');
        Route::get('/update/{id}', 'Backend\ServiceController@edit')->name('.edit');
        Route::post('/update/{id}', 'Backend\ServiceController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\ServiceController@show')->name('.detail');
    });

    /*
    |--------------------------------------------------------------------------
    | Transaksi Web Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'transaksi','middleware' => ['role:admin|operator'], 'as'=>'.transaksi'], function() {
        Route::get('/', 'Backend\TransaksiController@index')->name('.manage');
        Route::get('/kendaraan', 'Backend\TransaksiController@kendaraan')->name('.kendaraan');
        Route::get('/create/{id}', 'Backend\TransaksiController@create')->name('.create');
        Route::post('/create/{id}', 'Backend\TransaksiController@store')->name('.store');
        Route::get('/detail/{id}', 'Backend\TransaksiController@show')->name('.detail');
        Route::get('/finish/{id}', 'Backend\TransaksiController@finish')->name('.finish');
        Route::get('/cancel/{id}', 'Backend\TransaksiController@cancel')->name('.cancel');
    });


    Route::group(['prefix' => 'users','middleware' => ['role:admin'], 'as'=>'.users'], function() {

        /*
        |--------------------------------------------------------------------------
        | Operator Web Routes
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => 'operator','middleware' => ['role:admin'], 'as'=>'.operator'], function() {
            Route::get('/', 'Backend\UsersController@operator')->name('.manage');
            Route::get('/create', 'Backend\UsersController@create_operator')->name('.create');
            Route::post('/create', 'Backend\UsersController@store_operator')->name('.store');
            Route::get('/update/{id}', 'Backend\UsersController@edit_operator')->name('.edit');
            Route::post('/update/{id}', 'Backend\UsersController@update_operator')->name('.update');
            Route::get('/detail/{id}', 'Backend\UsersController@show_operator')->name('.detail');
        });

        /*
        |--------------------------------------------------------------------------
        | admin Web Routes
        |--------------------------------------------------------------------------
        */
        Route::group(['prefix' => 'admin','middleware' => ['role:admin'], 'as'=>'.admin'], function() {
            Route::get('/', 'Backend\UsersController@admin')->name('.manage');
            Route::get('/create', 'Backend\UsersController@create_admin')->name('.create');
            Route::post('/create', 'Backend\UsersController@store_admin')->name('.store');
            Route::get('/update/{id}', 'Backend\UsersController@edit_admin')->name('.edit');
            Route::post('/update/{id}', 'Backend\UsersController@update_admin')->name('.update');
            Route::get('/detail/{id}', 'Backend\UsersController@show_admin')->name('.detail');
        });

    });


    /*
    |--------------------------------------------------------------------------
    | Laporan Web Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'laporan','middleware' => ['role:admin'], 'as'=>'.laporan'], function() {
        Route::get('/', 'Backend\LaporanController@priod')->name('.priod');
        Route::post('/result', 'Backend\LaporanController@result')->name('.result');
    });

});