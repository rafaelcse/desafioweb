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



    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');
    Route::get('open', 'DataController@open');

    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'UserController@getAuthenticatedUser');
        Route::get('closed', 'DataController@closed');

        Route::post('pessoas/all', 'PessoasController@all');
        Route::post('pessoas/get/{id}', 'PessoasController@get');
        Route::post('pessoas/store', 'PessoasController@store');
        Route::post('pessoas/update/{id}', 'PessoasController@update');
        Route::post('pessoas/delete/{id}', 'PessoasController@destroy');
    });