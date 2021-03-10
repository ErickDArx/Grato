<?php

namespace App\Http\Controllers;

use App\t_mano_de_obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ManoObraController extends Controller
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
        $users = DB::table('t_usuario')->get();
        $operarios = DB::table('t_mano_de_obra')->get();

        return view('ManoObra', ['t_usuario' => $users, 't_mano_de_obra' => $operarios]);
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
        // Ver aquello que se envia a la base de datos
        // return $request->all();

        if ($request->ajax()) {
            $agregar = new t_mano_de_obra();
            $agregar->nombre_trabajador = $request->nombre_trabajador;
            $agregar->apellido_trabajador = $request->apellido_trabajador;
            $agregar->minutos_trabajados = $request->minutos_trabajados;
            $agregar->costo_minuto = $request->costo_minuto;
            $agregar->total_mano_obra = $request->minutos_trabajados * 20.59;

            // Insertar en la base de datos
            $agregar->save();
            // Redirigir a la vista original 
            // return back()->with('agregar', 'El usuario se ha agregado');

            return response()->json($agregar->toArray());

        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id_mano_de_obra)
    {

            $eliminar = t_mano_de_obra::findOrFail($id_mano_de_obra);
            $eliminar->delete();
            return back()->with('eliminar', 'El asistente fue eliminado exitosamente');

    }
}
