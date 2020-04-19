<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; //Recuperando modelos, App es el namespace
use Illuminate\Support\Facades\DB; //Recuperando resultados

/**
   Controladores
 * Los basicos
 * Controladores de recursos
 * @link https://laravel.com/docs/7.x/controllers#resource-controllers
 * 
 * Los basicos
 * Validación
 * @link https://laravel.com/docs/7.x/validation#quick-writing-the-validation-logic
 * 
   Modelos
 * ORM Elocuent
 * Definiendo modelos
 * @link https://laravel.com/docs/7.x/eloquent#defining-models
 * 
   App
 * ORM Elocuent
 * Recuperando modelos
 * @link https://laravel.com/docs/7.x/eloquent#retrieving-models
 * 
   DB
 * Base de datos
 * Ejecución de consultas SQL sin procesar
 * @link https://laravel.com/docs/7.x/database#running-queries
 * 
 * Base de datos
 * Recuperando resultados
 * @link https://laravel.com/docs/7.x/queries#retrieving-results
 * 
   Comprobar data
 * echo "<pre>";
 * print_r($dataCategoria);
 * echo "</pre>";
 * die();
 * 
 * ->dd();
 * dd($data);
 */

class NotasController extends Controller
{
    public function index($id = null){
        if($id == null):
            $detalleNotas  = App\Nota::all();
            $detalleNotas  = App\Nota::paginate(10);
            $detalleNotas2 = DB::select('select * from notas');
            $detalleNotas3 = DB::table('notas')
                                ->get();
            return view('notas.index', compact('detalleNotas', 'detalleNotas2', 'detalleNotas3'));
        endif;
        
        $detalleNota = App\Nota::findOrFail($id);
        return view('notas.show', compact('detalleNota'));        
    }

    public function store(Request $request){
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

    public function edit($id){
        $detalleNota = App\Nota::findOrFail($id);
        return view('notas.edit', compact('detalleNota'));
    }

    public function update(Request $request, $id){
        /* Obtenemos todo el request */
        // return $request->all();
        
        /* Validar request */
        $request->validate([
            'nombre'      => 'required',
            'descripcion' => 'required'
        ]);

        /* Guardamos nota */
        $notaActualizada              = App\Nota::find($id);
        $notaActualizada->nombre      = $request->nombre;
        $notaActualizada->descripcion = $request->descripcion;
        $notaActualizada->save();
        return back()->with('mensaje', 'Nota editada');
    }

    public function destroy($id){
        /* Eliminar nota */
        $notaEliminar = App\Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje_eliminado', 'Nota Eliminada');
    }
}
