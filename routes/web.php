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

/* Ruta por defecto */
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'NotasController@listar');
Route::get('/welcome', 'PagesController@welcome');
Route::get('/blog', 'PagesController@blog')->name('enlace-blog'); //name denota como sera llamado de href
Route::get('/about', 'PagesController@about')->name('enlace-about');
Route::get('/nosotros/{nombre?}', 'PagesController@nosotros')->name('enlace-nosotros');

/* Pruebas */
Route::get('/fotos/{id?}', 'PagesController@fotos')->where('id', '[0-9]+'); //Solo aceptara números en el parametro
Route::view('/about2', 'about', ['wea' => "KKK"]); 

/* Notas */
Route::get('/notas/{id?}', 'NotasController@listar')->name('notas.listar');
Route::post('/notas/guardar', 'NotasController@guardar')->name('notas.guardar');
Route::get('/notas/buscar/{id}', 'NotasController@buscar')->name('notas.buscar');
Route::put('/notas/editar/{id}', 'NotasController@editar' )->name('notas.editar');
Route::get('/notas/eliminar/{id}', 'NotasController@eliminar' )->name('notas.eliminar');
