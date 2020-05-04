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
    'only' => ['show', 'update', 'destroy']
]);

//Seller manage profile
Route::resource('seller', 'SellerController', [
    'only' => ['show', 'update', 'destroy']
]);

//Costumer review foods
Route::group(['prefix' => 'foods'], function () {
    Route::apiResource('/{foods}/reviews', 'ReviewController');
});

//Divers manage profile
Route::resource('driver', 'DriverController', [
    'only' => ['index', 'show', 'store']
]);
//Driver manage orders
Route::group(['prefix' => 'drivers'], function () {
    Route::apiResource('/{drivers}/carts', 'DriverViewOrders');
});