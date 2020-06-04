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
Route::get('/', 'NotasController@index');

/* Notas */
Route::get('/notas/{id?}'       , 'NotasController@index')   ->name('notas.index'); //Acá esta index, create y show
Route::post('/notas/store'      , 'NotasController@store')   ->name('notas.store');
Route::get('/notas/{id}/edit'   , 'NotasController@edit')    ->name('notas.edit');
Route::put('/notas/{id}'        , 'NotasController@update' ) ->name('notas.update');
Route::get('/notas/{id}/destroy', 'NotasController@destroy' )->name('notas.destroy');

Route::get('/welcome'           , 'PagesController@welcome') ->name('welcome.index');
Route::get('/blog'              , 'PagesController@blog')    ->name('blog.index');
Route::get('/about'             , 'PagesController@about')   ->name('about.index');
Route::get('/nosotros/{nombre?}', 'PagesController@nosotros')->name('nosotros.index');

/* Pruebas */
Route::get('/fotos/{id?}', 'PagesController@fotos')->where('id', '[0-9]+'); //Solo aceptara números en el parametro
Route::view('/about2'    , 'about', ['wea' => "KKK"]);
