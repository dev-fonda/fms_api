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
    
    // Company
    Route::group(['prefix' => 'mewr_hawker', 'as' => 'mewr_hawker.'], function() {
        Route::get('/', 'MEWRHawkerController@read');
        Route::get('/{id}', 'MEWRHawkerController@show');
        Route::post('/create', 'MEWRHawkerController@create');
        Route::post('/update/{id}', 'MEWRHawkerController@update');
    });
});
