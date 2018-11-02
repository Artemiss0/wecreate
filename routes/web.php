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

// Pages Routes...
Route::get('/', 'PagesController@index');
Route::get('/profile', 'ProjectsController@index');
//Route::get('/projects', 'ProjectsController@index');
Route::get('/discover', 'PagesController@discover');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Project Routes...
Route::resource('projects','ProjectsController');
Route::post('/projects', 'ProjectsController@store');
Route::post('/projects{id}','ProjectsController@like');

// Tags Routes
Route::resource('tags','TagsController');

//Admin Route
  Route::prefix('admin')->group(function (){
      Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
      Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
      Route::get('/', 'AdminController@index')->name('admin.index');
  });

