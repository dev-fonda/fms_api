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
    Route::group(['prefix' => 'company', 'as' => 'company.'], function() {
        Route::get('/', 'CompanyController@read');
        Route::get('/{id}', 'CompanyController@show');
        Route::post('/create', 'CompanyController@create');
        Route::post('/update/{id}', 'CompanyController@update');
    });
});
