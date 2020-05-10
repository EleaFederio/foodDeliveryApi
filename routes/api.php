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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//
Route::resource('foods', 'FoodController', [
        'only' => ['index', 'show', 'store']
    ]);

//Seller manage profile
Route::resource('user', 'UserController', [
    'only' => ['show', 'store', 'update', 'destroy']
]);

Route::resource('categories', 'CategoryController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::get('seller', 'SellerController@index');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('seller', 'SellerController', [
        'only' => ['show', 'store', 'update', 'destroy']
    ]);
});

Route::post('seller_register', "SellerController@store");
Route::post('seller_login', "SellerController@login");

//Seller manage profile

Route::post('customer_register', "UserController@store");
Route::post('customer_login', "UserController@login");
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('user', 'UserController', [
        'only' => ['show', 'update', 'destroy']
    ]);
});

//Costumer review foods
Route::group(['prefix' => 'foods'], function () {
    Route::apiResource('/{foods}/reviews', 'ReviewController');
});

Route::group(['prefix' => 'users'], function () {
    Route::apiResource('/{users}/cart', 'CartController');
});

Route::resource('carts', 'CartController', [
    'only' => ['store', 'show', 'update', 'destroy']
]);

//Divers manage profile
Route::resource('driver', 'DriverController', [
    'only' => ['index', 'store', 'show', 'store']
]);
//Driver manage orders
Route::group(['prefix' => 'drivers'], function () {
    Route::apiResource('/{drivers}/carts', 'DriverViewOrders');
});