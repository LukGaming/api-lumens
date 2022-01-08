<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ProdutoController;



$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/produtos',  'ProdutoController@index');
    $router->post('/produtos',  'ProdutoController@store');
    $router->get('/produtos/{id}',  'ProdutoController@edit');
    $router->patch('/produtos/{id}',  'ProdutoController@update');
    $router->delete('/produtos/{id}',  'ProdutoController@destroy');
});
