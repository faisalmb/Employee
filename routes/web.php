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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('AddEmployee', ['uses' => 'EmployeeController@store']);
    $router->post('AddRoute', ['uses' => 'RouteController@store']);
    $router->post('AddTransactino', ['uses' => 'TransactinoController@store']);
    $router->get('Transactino/{routeId}/{transactinosId}', ['uses' => 'TransactinoController@getAllTransactionsByIdRequest']);
    $router->get('Transactino/{routeId}', ['uses' => 'TransactinoController@getAllTransactionsRequest']);
});
