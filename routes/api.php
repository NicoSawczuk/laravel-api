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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::post('/register', 'Api\AuthController@register');
    Route::post('/login', 'Api\AuthController@login');


    //Rutas a las que se permitirá acceso
    Route::get('/wallet/{user}', 'WalletController@show')->name('wallet.show')->middleware('auth:api');

    Route::post('/transfer', 'TransferController@store')->name('transfer.save')->middleware('auth:api');

    Route::get('/transfer/{transfer}', 'TransferController@show')->name('transfer.show')->middleware('auth:api');

    Route::get('/contacts', 'ContactController@index')->name('contact.index')->middleware('auth:api');

    Route::post('/contacts', 'ContactController@store')->name('contact.save')->middleware('auth:api');

    Route::put('/contacts/{contact}', 'ContactController@update')->name('contact.update')->middleware('auth:api');

    Route::delete('/contacts/{contact}', 'ContactController@destroy')->name('contact.delete')->middleware('auth:api');



    //Canchas
    Route::get('/canchas/', 'CanchaController@index')->name('canchas.index');

    Route::post('/canchas/', 'CanchaController@store')->name('canchas.store');
