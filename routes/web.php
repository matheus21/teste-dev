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

$router->get('/', 'TesteController@form');
$router->post('/post', 'TesteController@post');
$router->get('/lista', 'TesteController@get');
$router->get('/exercicios', 'TesteController@exercicios');
$router->get('/curl', 'TesteController@curlRequest');