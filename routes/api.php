<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:api'])->get('/user', function (Request $request){

    return $request->user();
});

Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');

    Route::get('/barang', 'BarangController@index');
    Route::get('/barang/{id}', 'BarangController@show')->middleware('jwt.verify'); 
    Route::post('/barang', 'BarangController@store')->middleware('jwt.verify'); 
    Route::put('/barang/{id}', 'BarangController@update')->middleware('jwt.verify'); 
    Route::delete('/barang/{id}', 'BarangController@destroy')->middleware('jwt.verify'); 


