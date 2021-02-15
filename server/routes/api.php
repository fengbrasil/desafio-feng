<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('orders', 'ApiController@orders')->name('api.orders');
Route::get('orders/{order}', 'ApiController@order')->name('api.order');