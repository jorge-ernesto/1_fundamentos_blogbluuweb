<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Ejecución de consultas SQL sin procesar

/** 
   DB
 * Base de datos
 * Ejecución de consultas SQL sin procesar
 * @link https://laravel.com/docs/7.x/database#running-queries
 * 
 * Base de datos
 * Recuperando Resultados
 * @link https://laravel.com/docs/7.x/queries#retrieving-results
 * 
   App
 * ORM Elocuent
 * Recuperando modelos
 * @link https://laravel.com/docs/7.x/eloquent#retrieving-models
 * 
 * ORM Elocuent
 * Subconsultas avanzadas
 * @link https://laravel.com/docs/7.x/eloquent#advanced-subqueries
 */

class NotasController extends Controller
{
    public function listar($id = null){        
        /* Obtenemos todo */
        if($id == null):
            // $detalleNotas  = App\Nota::all();
            $detalleNotas  = App\Nota::paginate(10);
            $detalleNotas2 = DB::select('select * from notas');
            return view('notas', compact('detalleNotas','detalleNotas2'));
        endif;

        /* Obtenemos el detalle por id */
        $detalleNota = App\Nota::findOrFail($id);
        return view('notas.detalle', compact('detalleNota'));        
    }

    public function guardar(Request $request){
        /* Obtenemos todo el request */
        // return $request->all();

        /* Validar request */
        $request->validate([
            'nombre'      => 'required',
            'descripcion' => 'required'
        ]);

        /* Guardamos nota */
        $notaNueva              = new App\Nota;
        $notaNueva->nombre      = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $notaNueva->save();
        return back()->with('mensaje', 'Nota agregada');
    }

    public function buscar($id){
        $detalleNota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('detalleNota'));
    }

    public function editar(Request $request, $id){
        /* Obtenemos todo el request */
        // return $request->all();
        
        /* Validar request */
        $request->validate([
            'nombre'      => 'required',
            'descripcion' => 'required'
        ]);

        /* Editamos nota */
        $notaActualizada              = App\Nota::find($id);
        $notaActualizada->nombre      = $request->nombre;
        $notaActualizada->descripcion = $request->descripcion;
        $notaActualizada->save();
        return back()->with('mensaje', 'Nota editada');
    }

    public function eliminar($id){
        $notaEliminar = App\Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje_eliminado', 'Nota Eliminada');
    }
}
