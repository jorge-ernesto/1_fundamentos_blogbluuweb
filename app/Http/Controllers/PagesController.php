<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App; //Recuperando modelos (namespace para el select)
use Illuminate\Support\Facades\DB; //Ejecución de consultas SQL sin procesar

class PagesController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function fotos($id = null){
        $id = isset($id) ? $id : "Sin número";
        return 'Estas en la galería de fotos: '.$id;
    }

    public function blog(){
        return view('blog');
    }

    public function about(){
        return view('about');
    }

    public function nosotros($nombre = null){
        $dataEquipo = array();
        $dataEquipo[]['nombre'] = "Ignacio";
        $dataEquipo[]['nombre'] = "Jorge";
        $dataEquipo[]['nombre'] = "Lilia";
                       
        // return view('nosotros', ["dataEquipo" => $dataEquipo, "nombre" => $nombre]);
        return view('nosotros', compact('dataEquipo','nombre'));
    }

    public function notas(){
        /**
         * ORM Elocuent
         * Recuperando modelos
         * @link https://laravel.com/docs/7.x/eloquent#retrieving-models
         */
        $notas = App\Nota::all();

        /**
         * Base de datos
         * Ejecución de consultas SQL sin procesar
         * @link https://laravel.com/docs/7.x/database#running-queries
         */
        $notas2 = DB::select('select * from notas');

        return view('notas', compact('notas','notas2'));
    }
}
