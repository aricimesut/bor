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

$router->post('/login', 'AuthController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {

    //vehicles route
    $router->group(['prefix' => 'vehicles'], function () use ($router) {
        $router->get('/', 'VehicleController@index');
        $router->get('/available', 'VehicleController@available');
    });

    //employees route
    $router->group(['prefix' => 'employees'], function () use ($router) {
        $router->get('/', 'EmployeeController@index');
    });

    //assignments route
    $router->group(['prefix' => 'assignments'], function () use ($router) {
        $router->get('/', 'AssignmentController@index');
        $router->post('/', 'AssignmentController@store');
        $router->get('/{id}', 'AssignmentController@show');
        $router->put('/{id}', 'AssignmentController@update');
        $router->delete('/{id}', 'AssignmentController@destroy');

    });
});
