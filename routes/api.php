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
Route::group(
    ['middleware' => 'Head'], function () {
    Route::get('types','Api\ProductController@types');
    Route::get('banners','Api\ProductController@banners');
    Route::get('recommendedTypes','Api\ProductController@recommendedTypes');
    Route::get('recommendProducts','Api\ProductController@recommendProducts');
    Route::get('findProduct','Api\ProductController@findProduct');
    Route::get('showProduct','Api\ProductController@showProduct');
    Route::get('typeProducts','Api\ProductController@typeProducts');
});
