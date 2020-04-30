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
    $router->get('/bookings', 'Bookings\BookingsController@index');
    $router->post('/bookings', 'Bookings\BookingsController@store');
    $router->get('/bookings/{booking}', 'Bookings\BookingsController@show');
    $router->put('/bookings/{booking}', 'Bookings\BookingsController@update');
    $router->patch('/bookings/{booking}', 'Bookings\BookingsController@update');
    $router->delete('/bookings/{booking}', 'Bookings\BookingsController@destroy');
});