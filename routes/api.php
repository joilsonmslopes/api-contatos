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

Route::get('/status', 'Api\ContatoController@status')->name('api.status');

Route::prefix('contatos')->group( function() {
    Route::namespace('Api')->group( function() {
        Route::post('/store', 'ContatoController@store');
        
        Route::get('/', 'ContatoController@list');
        Route::get('/{id}', 'ContatoController@select');

        Route::put('/{id}', 'ContatoController@update');

    });
});