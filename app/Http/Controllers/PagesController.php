<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function inicio(){
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
        
        // echo "<pre>";
        // print_r($dataEquipo);
        // echo "</pre>";
        // echo "<script>console.log('" . json_encode($dataEquipo) . "')</script>";

        // return view('nosotros', ["dataEquipo" => $dataEquipo, "nombre" => $nombre]);
        return view('nosotros', compact('dataEquipo','nombre'));
    }

    public function notas(){
        $notas = App\Nota::all();
        $notas2 = DB::select('select * from notas');
        return view('notas', compact('notas','notas2'));
    }
}
