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
//申请
Route::post('apply/create','Api\ApplyController@create');
//客户信息
Route::post('customer/create','Api\CustomerController@create');
Route::get('customer/find','Api\CustomerController@findCustomer');
//产品信息
Route::post('product/list','Api\ProductController@index');
Route::get('product/find','Api\ProductController@findProduct');
Route::get('product/pop','Api\ProductController@popProducts');
