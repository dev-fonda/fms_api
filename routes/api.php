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

Route::post('login', 'AuthController@login');

Route::middleware('auth:api')->group(function(){
    Route::post('details', 'AuthController@getDetails');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    
    
    // ===================================================== MASTERFILE

    // Company
    Route::group(['prefix' => 'mewr_hawker', 'as' => 'mewr_hawker.'], function() {
        Route::get('/', 'MewrHawkerController@read');
        Route::get('/{id}', 'MewrHawkerController@show');
        Route::post('/create', 'MewrHawkerController@create');
        Route::post('/update/{id}', 'MewrHawkerController@update');
    });

    // Company
    Route::group(['prefix' => 'hdb_hawker', 'as' => 'hdb_hawker.'], function() {
        Route::get('/', 'HdbHawkerController@read');
        Route::get('/{id}', 'HdbHawkerController@show');
        Route::post('/create', 'HdbHawkerController@create');
        Route::post('/update/{id}', 'HdbHawkerController@update');
    });

    // ===================================================== MASTERFILE
});
