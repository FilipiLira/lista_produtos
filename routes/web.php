<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return "<h1>Primeira lógica Laravel</h1>";
});

Route::get('/outra', function(){
	return '<h1>Outra rota, 86</h1>';
});

/*Route::get('/produtos', 'ProdutoController@listar');
//Route::get('/produtos/novocadastro', 'ProdutoController@novoCadastro');
//Route::get('/produtos/detalhes?id', 'ProdutoController@detalhes'); => rota para parametro de busca
Route::get('/produtos/detalhes/{id}', 'ProdutoController@detalhes')->where('id', '[0-9]+'); // => rota para parametro de rota, usa-se '?' depois do id para indicar que é opcional, neste caso, não uso, o parâmetro é origatório.
Route::post('/produtos/cadastrar', 'ProdutoController@cadastrar');
Route::get('/produtos/excluir/{id}', 'ProdutoController@excluir')->where('id', '[0-9]+');
Route::get('/produtos/editar/{id}', 'ProdutoController@editarForm')->where('id', '[0-9]+');
Route::post('/produtos/editar','ProdutoController@editar');

Route::get('/retornaJson', 'ProdutoController@retornaJson');

Route::get('/download/pdf', 'ProdutoController@baixar');*/

// Grupo de rotas para produtos
Route::prefix('produtos')->group(function(){
	Route::get('/', 'ProdutoController@listar');
	Route::get('novocadastro', 'ProdutoController@novoCadastro');
	Route::get('detalhes/{id}', 'ProdutoController@detalhes')->where('id', '[0-9]+');
	Route::post('cadastrar', 'ProdutoController@cadastrar');
	Route::get('excluir/{id}', 'ProdutoController@excluir')->where('id', '[0-9]+');
    Route::get('editar/{id}', 'ProdutoController@editarForm')->where('id', '[0-9]+');
    Route::post('editar', 'ProdutoController@editar');
});
