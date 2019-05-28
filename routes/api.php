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
Route::group(["namespace" => "App\Http\Controllers\Api"], function () {
    //之后在这里写api
    Route::get('token', 'AuthenticateController@authenticate');
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(["namespace" => "App\Http\Controllers\Api",'middleware'=>'auth:api'], function ($api) {
        //之后在这里写api
        $api->post('decode', 'AccountController@decode');
    });

    $api->group(["namespace" => "App\Http\Controllers\Api"], function ($api) {
        //之后在这里写api
        $api->post('login', 'AccountController@login');
    });
    $api->group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Api'], function ($api) {
        $api->get('users/{id}', ['uses' => 'UserController@show']);
    });
});
