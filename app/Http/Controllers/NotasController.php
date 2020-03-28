<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App; //Recuperando modelos (namespace para el select)
use Illuminate\Support\Facades\DB; //Ejecución de consultas SQL sin procesar

class NotasController extends Controller
{
    public function listar($id = null){
        if($id == null){
            /**
             * ORM Elocuent
             * Recuperando modelos
             * @link https://laravel.com/docs/7.x/eloquent#retrieving-models
             */
            $detalleNotas = App\Nota::all();

            /**
             * Base de datos
             * Ejecución de consultas SQL sin procesar
             * @link https://laravel.com/docs/7.x/database#running-queries
             */
            $detalleNotas2 = DB::select('select * from notas');

            return view('notas', compact('detalleNotas','detalleNotas2'));
        }else{
            $detalleNota = App\Nota::findOrFail($id);
            return view('notas.detalle', compact('detalleNota'));
        }   
    }

    public function guardar(Request $request){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        /* Guardamos nota */
        $notaNueva = new App\Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada');
    }

    public function buscar($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }
}
