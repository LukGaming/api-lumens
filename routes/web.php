<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\fileUploadsController;
use App\Http\Controllers\UploadImagesProductController;
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
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('user/{id}', 'UserController@getUserById');

    /*Rotas de Produtos*/
    $router->get('/produtos',  'ProdutosController@index');
    $router->post('/produtos',  'ProdutosController@store');
    $router->get('/produtos/{id}',  'ProdutosController@edit');
    $router->patch('/produtos/{id}',  'ProdutosController@update');
    $router->delete('/produtos/{id}',  'ProdutosController@destroy');
    /*Rotas de Produtos*/

    //Rotas de Categorias
    $router->get('/categorias',  'CategoriasController@index');
    $router->post('/categorias',  'CategoriasController@store');
    $router->get('/categorias/{id}',  'CategoriasController@edit');
    $router->patch('/categorias/{id}',  'CategoriasController@update');
    $router->delete('/categorias/{id}',  'CategoriasController@destroy');
    //Rotas de Categorias
    $router->post('/files', 'UploadImagesProductController@upload_image_produto');
    $router->get('imagens/produtos/{id_produto}' ,'UploadImagesProductController@list_images_produto');
});
