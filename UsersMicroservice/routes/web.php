<?php

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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users', 'Users\UsersController@index');
    $router->post('/users', 'Users\UsersController@store');
    $router->get('/users/{user}', 'Users\UsersController@show');
    $router->put('/users/{user}', 'Users\UsersController@update');
    $router->patch('/users/{user}', 'Users\UsersController@update');
    $router->delete('/users/{user}', 'Users\UsersController@destroy');


    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('/login', 'Auth\AuthenticationController@login');
    });
});