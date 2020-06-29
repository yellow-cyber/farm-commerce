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

Route::apiResources([
    'user' => 'API\UserController',
    'products'=>'API\ProductController',
    'cart'=>'API\CartController',
    'orders'=>'API\OrdersController',
    'sales'=>'API\SalesHistoryController'
]);
Route::post('cart/checkout',"API\CartController@checkout");
Route::get('my-orders',"API\OrdersController@authIndex");
Route::post('orders/claim-all',"API\OrdersController@claimAll");
Route::post('orders/confirm-all',"API\OrdersController@confirmAll");
Route::post('orders/confirm/{id}',"API\OrdersController@confirm");