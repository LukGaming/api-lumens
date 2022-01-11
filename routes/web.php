<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProdutoController;

$router->group(['prefix' => 'api'], function () use ($router) {
    //Rotas de Produtos
    $router->get('/produtos',  'ProdutoController@index');
    $router->post('/produtos',  'ProdutoController@store');
    $router->get('/produtos/{id}',  'ProdutoController@edit');
    $router->patch('/produtos/{id}',  'ProdutoController@update');
    $router->delete('/produtos/{id}',  'ProdutoController@destroy');
    //Rotas de Produtos

    //Rotas de Categorias
    $router->get('/categorias',  'CategoriasController@index');
    $router->post('/categorias',  'CategoriasController@store');
    $router->get('/categorias/{id}',  'CategoriasController@edit');
    $router->patch('/categorias/{id}',  'CategoriasController@update');
    $router->delete('/categorias/{id}',  'CategoriasController@destroy');
    //Rotas de Categorias
});
