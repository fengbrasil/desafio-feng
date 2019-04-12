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

Route::get('/', function () {
    return view('index');
});

Route::get('/pedidos', function () {
    return view('pedidos');
});

Route::get('/cliente', function () {
    return view('cliente');
});

Route::get('/itens', function () {
    return view('item');
});

Route::post("/cliente/salvarcliente", "ClienteController@salvarCliente");
Route::post("/item/salvaritem", "ItemController@salvarItem");
