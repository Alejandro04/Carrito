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
    return view('welcome');
});

Auth::routes();

//Route::resource('products', 'ProductsController');

Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products', ['as' => 'products.store', 'uses' => 'ProductsController@store' ]);
Route::get('/products/{id}', ['as' => 'products.show', 'uses' => 'ProductsController@show' ]);
Route::get('/products/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
Route::put('/products/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update' ]);
Route::delete('/products/{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);

Route::get('/home', 'HomeController@index')->name('home');
