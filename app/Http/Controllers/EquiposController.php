<?php

namespace App\Http\Controllers;

use App\t_equipos;
use App\t_usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $equipos = DB::table('t_equipos')->get();
        return view('Equipo' , ['t_equipos' => $equipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $agregar = new t_equipos();
            $agregar->nombre_equipo = $request->nombre_equipo;
            $agregar->tiempo_uso = $request->tiempo_uso;
            $agregar->costo_minuto = 20.59;
            $agregar->total = $request-> tiempo_uso * 20.59;
            // Insertar en la base de datos
            $agregar->save();
            // Redirigir a la vista original 
            return back()->with('agregar', 'El usuario se ha agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_equipo)
    {
        $edit = t_equipos::findOrFail($id_equipo);
        $edit->nombre_equipo = $request->nombre_equipo;
        $edit->minutos_trabajados = $request->minutos_trabajados;
        $edit->save();
        return back()->with('Perfil','Todo salio bien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_equipo)
    {
        $eliminar = t_equipos::findOrFail($id_equipo);
        $eliminar->delete();
        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
