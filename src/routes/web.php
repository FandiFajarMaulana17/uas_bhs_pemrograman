<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1/testing', 'middleware' => 'auth'], function() use ($router) {
    $router->get('/', ['uses' => 'UserController@index']);
});

$router->group(['prefix' => 'api/v1/data_marketing', 'middleware' => 'auth'], function() use ($router) {
    $router->get('/', ['uses' => 'DataMarketingController@index']);
    $router->post('/', ['uses' => 'DataMarketingController@store']);
    $router->put('/{id}', ['uses' => 'DataMarketingController@update']);
    $router->get('/{id}', ['uses' => 'DataMarketingController@show']);
    $router->delete('/{id}', ['uses' => 'DataMarketingController@destroy']);
});