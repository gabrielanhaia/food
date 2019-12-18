<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes V1
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth',
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});


Route::group([
    'prefix' => 'products',
], function ($router) {
    Route::get('', 'ProductController@listProducts');
});

Route::group([
    'prefix' => 'collect-requests',
], function ($router) {
    Route::post('', 'CollectRequestController@createCollectRequest');
    Route::get('{id}', 'CollectRequestController@getCollectRequest');
    Route::get('', 'CollectRequestController@listAllCollectRequests');
    Route::put('{id}', 'CollectRequestController@updateCollectRequest');
    Route::delete('{id}', 'CollectRequestController@deleteCollectRequest');
});
