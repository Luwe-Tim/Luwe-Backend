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
$router->post('/image', 'UserController@gambar');

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', function () {
        return response()->json([
            'message' => 'Welcome to Luwe API',
            'status' => 'success',
        ], 200);
    });
    $router->get('/admin/dashboard', 'UserController@index');
    $router->get('deskripsi', 'DeskripsiController@index');
    $router->post('/pedagang/deskripsi', 'DeskripsiController@store');
    $router->get('/user/location', 'LocationController@store');
    $router->get('/admin/verified/{id}', 'VerificationController@verified');
    $router->get('/admin/verification', 'VerificationController@verification');
});