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

Route::get('/fotos/{id?}', function($id = "Sin numero") {

    return 'Estas en la galería de fotos: '.$id;

})->where('id', '[0-9]+'); //Solo aceptara números en el parametro

//Retornamos una vista
Route::view('/landing', 'landing', ['wea' => "KKK"]); 
Route::view('/landing2', 'landing2', ['wea' => "KKK 2"]); 

Route::get('/blog', function() {
    return view('blog');
})->name('enlace-blog'); //Podrá ser llamado desde href

Route::get('/about', function() {
    return view('about');
})->name('enlace-about');

Route::get('/nosotros/{nombre?}', function($nombre = null) {

    $dataEquipo = array();
    $dataEquipo[]['nombre'] = "Ignacio";
    $dataEquipo[]['nombre'] = "Jorge";
    $dataEquipo[]['nombre'] = "Lilia";
    
    // echo "<pre>";
    // print_r($dataEquipo);
    // echo "</pre>";

    // echo "<script>console.log('" . json_encode($dataEquipo) . "')</script>";

    // return view('nosotros', ["dataEquipo" => $dataEquipo, "nombre" => $nombre]);
    return view('nosotros', compact('dataEquipo','nombre'));
})->name('enlace-nosotros');
