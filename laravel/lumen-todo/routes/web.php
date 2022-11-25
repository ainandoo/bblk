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

use Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router -> get('/key', function(){
    return Str::random(32);
});

$router -> group(['prefix' => 'api'], function() use ($router) {

$router -> post('todo', 'TodoController@store');
$router -> get('todo', 'TodoController@index');
$router -> get('todo/{id}', 'TodoController@show');
$router -> put('todo/{id}', 'TodoController@update');
$router -> delete('todo/{id}', 'TodoController@destroy');
});
