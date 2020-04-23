<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/produtos', 'controllerProduct@indexView');


Route::get('/categorias', 'controllerDepartment@index');
Route::get('/categorias/novo', 'controllerDepartment@create');
Route::get('/categorias/apagar/{id}', 'controllerDepartment@destroy');
Route::get('/categorias/editar/{id}', 'controllerDepartment@edit');
Route::post('/categorias/{id}', 'controllerDepartment@update');
Route::post('/categorias', 'controllerDepartment@store');
