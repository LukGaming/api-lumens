<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ProdutoController;



$router->group(['prefix' => '/produtos'], function () use ($router) {
    $router->get('',  'ProdutoController@index');
    $router->post('',  'ProdutoController@store');
    $router->get('/{id}',  'ProdutoController@edit');
    $router->patch('{id}',  'ProdutoController@update');
    $router->delete('/{id}',  'ProdutoController@destroy');
});
