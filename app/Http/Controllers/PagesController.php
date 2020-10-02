<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function blog()
    {
        return view('blog');
    }

    public function about()
    {
        return view('about');
    }

    public function nosotros($nombre = null)
    {
        $dataEquipo = array();
        $dataEquipo[]['nombre'] = "Ignacio";
        $dataEquipo[]['nombre'] = "Jorge";
        $dataEquipo[]['nombre'] = "Lilia";
                       
        // return view('nosotros', ["dataEquipo" => $dataEquipo, "nombre" => $nombre]);
        return view('nosotros', compact('dataEquipo','nombre'));
    }

    public function fotos($id = null)
    {
        $id = isset($id) ? $id : "Sin número";
        return 'Estas en la galería de fotos: '.$id;
    }
}
