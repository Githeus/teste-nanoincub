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

// Redireciona para home, 
// forçando a realizar o login como primeira ação no sistema
Route::redirect('/', 'home');
Route::get('/home', 'HomeController@index')->name('home');

// Rotas protegidas por autenticação 'auth'
Route::middleware(['auth'])->group(function () {
  
});

