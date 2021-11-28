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

$router->get('/books', 'BookController@index');
$router->post('/books', 'BookController@store');
$router->get('/books/{author}', 'BookController@show');
$router->put('/books/{author}', 'BookController@update');
$router->patch('/books/{author}', 'BookController@update');
$router->delete('/books/{author}', 'BookController@destroy');