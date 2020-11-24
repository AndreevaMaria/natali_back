<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//Auth::routes();
/*
 Authentication Routes...
get('login', 'Auth\LoginController@showLoginForm')->name('login');
post('login', 'Auth\LoginController@login');
post('logout', 'Auth\LoginController@logout')->name('logout');

 Registration Routes...
get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
post('register', 'Auth\RegisterController@register');

 Password Reset Routes...
get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
post('password/reset', 'Auth\ResetPasswordController@reset');
*/



Route::post('/login', 'AuthController@postLogin');
Route::post('/registration', 'AuthController@postRegister');
Route::post('/registration/{idUser}', 'AuthController@updateUser');
Route::post('/logout', 'AuthController@postLogout');

//Route::group([
//    'middleware' => 'admin',
//], function () {
    Route::post('/fabricstype', 'FabricsTypeController@postFabricsType');
    Route::put('/fabricstype/{id}', 'FabricsTypeController@updateFabricsType');
    Route::delete('/fabricstype/{id}', 'FabricsTypeController@deleteFabricsType');
    Route::post('/files/fabricstype/upload', 'FabricsTypeController@addFabricsTypeImage');
    Route::post('/fabricstype/{id}/fabric', 'FabricController@postFabric');
    Route::put('/fabricstype/{id}/fabric/{idFabric}', 'FabricController@updateFabric');
    Route::delete('/fabricstype/{id}/fabric/{idFabric}', 'FabricController@deleteFabric');
    Route::post('/files/fabric/upload', 'FabricController@addFabricImage');
    Route::post('/files/upload', 'PhotoController@addPhotos');
    Route::delete('/files/{id}', 'PhotoController@deletePhoto');

    Route::get('/admin/users', 'AdminUserController@getUserList');
    Route::get('/admin/users/{idUser}', 'AdminUserController@getUser');
    Route::post('/admin/users', 'AdminUserController@postUser');
    Route::put('/admin/users/{idUser}', 'AdminUserController@updateUser');
    Route::delete('/admin/users/{idUser}', 'AdminUserController@deleteUser');
    Route::get('/admin/orders', 'AdminOrderController@getOrderList');
    Route::get('/admin/orders/{idOrder}', 'AdminOrderController@getOrder');
    Route::post('/admin/orders', 'AdminOrderController@postOrder');
    Route::put('/admin/orders/{idOrder}', 'AdminOrderController@updateOrder');
    Route::delete('/admin/orders/{idOrder}', 'AdminOrderController@deleteOrder');
    Route::get('/admin/orders/{idFabric}', 'AdminOrderController@getOrderListbyFabric');

//});


    //Route::group(['namespace' => 'users'], function() {
        Route::get('/users/{idUser}', 'UserController@getUser');
        Route::put('/users/{idUser}', 'UserController@updateUser');
        Route::delete('/users/{idUser}', 'UserController@deleteUser');
        Route::get('/users/{idUser}/orders', 'OrderController@getOrderList');


        //Route::group(['namespace' => 'index'], function() {
            Route::get('/fabricstype', 'FabricsTypeController@getFabricsTypeList');
            Route::get('/fabricstype/{id}', 'FabricsTypeController@getFabricsType');
            Route::get('/fabricstype/{id}/fabric', 'FabricController@getFabricsList');
            Route::get('/fabricstype/{id}/fabric/{idFabric}', 'FabricController@getFabric');
            Route::get('/fabricstype/{id}/files', 'PhotoController@getPhotoList');
            Route::get('/fabric/search', 'FabricController@search');
            Route::get('/fabric_new', 'FabricController@getFabricNew');
            Route::get('/fabric_action', 'FabricController@getFabricAction');
            Route::get('/fabric_trend', 'FabricController@getFabricTrend');
            Route::get('/fabric/new', 'FabricController@getFabricNewList');
            Route::get('/fabric/action', 'FabricController@getFabricActionList');
            Route::get('/fabric/trend', 'FabricController@getFabricTrendList');
            Route::post('/users', 'UserController@postUser');
            Route::get('/users/{idUser}/orders/{idOrder}', 'OrderController@getOrder');
            Route::post('/users/{idUser}/orders', 'OrderController@postOrder');
            Route::put('/users/{idUser}/orders/{idOrder}', 'OrderController@updateOrder');
            Route::delete('/users/{idUser}/orders/{idOrder}', 'OrderController@deleteOrder');
            Route::post('/users/{idUser}/orders/{idOrder}', 'OrdersFabricController@postOrdersFabric');
            Route::put('/users/{idUser}/orders/{idOrder}/{idFabric}', 'OrdersFabricController@updateOrdersFabric');
            Route::delete('/users/{idUser}/orders/{idOrder}/{idFabric}', 'OrdersFabricController@deleteOrdersFabric');
        //});
    //});
//});

