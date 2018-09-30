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

Route::get('/about', function () {
    return view('welcome');
});

Route::prefix('products')->group(function (){
    Route::get('/', ['uses' => 'ProductsController@index']);
    Route::get('/details/{id}', ['uses' => 'ProductsController@show']);
// uses geeft aan welke controler er gepakt moet worden @ geeft aan welke functie in de controller gepakt moet worden
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
