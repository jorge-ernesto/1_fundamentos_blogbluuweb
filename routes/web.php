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

/* Ruta por defecto */
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@notas');
Route::get('/welcome', 'PagesController@welcome');
Route::get('/blog', 'PagesController@blog')->name('enlace-blog'); //Podrá ser llamado desde href
Route::get('/about', 'PagesController@about')->name('enlace-about');
Route::get('/nosotros/{nombre?}', 'PagesController@nosotros')->name('enlace-nosotros');
Route::get('/notas', 'PagesController@notas')->name('enlace-notas');

/* Pruebas */
Route::get('/fotos/{id?}', 'PagesController@fotos')->where('id', '[0-9]+'); //Solo aceptara números en el parametro
Route::view('/pruebas/landing', 'landing', ['wea' => "KKK"]); 