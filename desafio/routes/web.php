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
Auth::routes();
Route::get('/', function(){
    if(Auth::check())
        return redirect('pedidos');
    else
        return redirect('login');
});

Route::post('/inserir_pedido', 'PedidoController@inserir_pedido');

Route::get('/pedidos', 'PedidoController@lista');

Route::get('/pedidos/{id}', 'PedidoController@mostra');

Route::get('/adicionar/pedido', 'PedidoController@form_adicionar');

Route::get('/home', 'HomeController@index')->name('home');
