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
Route::group(['middleware' => ['jwt.verify']], function() {

});

//Route::group(['namespace' => 'Admin'], function() {
    Route::post('/fabricstype', 'FabricsTypeController@postFabricsType');
    Route::put('/fabricstype/{id}', 'FabricsTypeController@updateFabricsType');
    Route::delete('/fabricstype/{id}', 'FabricsTypeController@deleteFabricsType');
    Route::post('/fabricstype/{id}/fabric', 'FabricController@postFabric');
    Route::put('/fabricstype/{id}/fabric/{idFabric}', 'FabricController@updateFabric');
    Route::delete('/fabricstype/{id}/fabric/{idFabric}', 'FabricController@deleteFabric');
    Route::post('/fabric/{idFabric}/files/upload', 'PhotoController@addPhotos');
    Route::delete('/fabric/{idFabric}/files', 'PhotoController@deletePhoto');

    Route::get('/admin/users', 'AdminUserController@getUsersList');
    Route::get('/admin/users/{idUser}', 'AdminUserController@getUser');
    Route::post('/admin/users', 'AdminUserController@postUser');
    Route::put('/admin/users/{idUser}', 'AdminUserController@updateUser');
    Route::delete('/admin/users/{idUser}', 'AdminUserController@deleteUser');
    Route::get('/admin/orders', 'AdminOrderController@getOrderList');
    Route::get('/admin/orders/{idOrder}', 'AdminOrderController@getOrder');
    Route::post('/admin/orders', 'AdminOrderController@postOrder');
    Route::put('/admin/orders/{idOrder}', 'AdminOrderController@updateOrder');
    Route::delete('/admin/orders/{idOrder}', 'AdminOrderController@deleteOrder');

    //Route::group(['namespace' => 'User'], function() {
        Route::get('/users/{idUser}', 'UserController@getUser');
        Route::put('/users/{idUser}', 'UserController@updateUser');
        Route::delete('/users/{idUser}', 'UserController@deleteUser');
        Route::get('/users/{idUser}/orders', 'OrderController@getOrderList');
        Route::get('/users/{idUser}/orders/{idOrder}', 'OrderController@getOrder');
        Route::post('/users/{idUser}/orders', 'OrderController@postOrder');
        Route::put('/users/{idUser}/orders/{idOrder}', 'OrderController@updateOrder');
        Route::delete('/users/{idUser}/orders/{idOrder}', 'OrderController@deleteOrder');

        //Route::group(['namespace' => 'Guest'], function() {
            Route::get('/fabricstype', 'FabricsTypeController@getFabricsTypeList');
            Route::get('/fabricstype/{id}', 'FabricsTypeController@getFabricsType');
            Route::get('/fabricstype/{id}/fabric', 'FabricController@getFabricsList');
            Route::get('/fabricstype/{id}/fabric/{idFabric}', 'FabricController@getFabric');
            Route::get('/fabric/search', 'FabricController@search');
            Route::get('/fabric_new', 'FabricController@getFabricNew');
            Route::get('/fabric_action', 'FabricController@getFabricAction');
            Route::get('/fabric_trend', 'FabricController@getFabricTrend');
            Route::get('/fabric/new', 'FabricController@getFabricNewList');
            Route::get('/fabric/action', 'FabricController@getFabricActionList');
            Route::get('/fabric/trend', 'FabricController@getFabricTrendList');
        //});
    //});
//});
