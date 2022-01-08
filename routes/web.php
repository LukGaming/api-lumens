<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ProdutoController;


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

// $router->get('/produtos', function () use ($router) {

// });
// $router->post('/produtos', function () use ($router) {
//     return Produtos::paginate(5);
//  });



$router->get('/produtos',  'ProdutoController@getAllProducts');
$router->post('/produtos',  'ProdutoController@insertProducts');
$router->get('/produtos/{id}',  'ProdutoController@getProductById');
$router->patch('/produtos/{id}',  'ProdutoController@editProductById');
$router->delete('/produtos/{id}',  'ProdutoController@deleteProductById');
