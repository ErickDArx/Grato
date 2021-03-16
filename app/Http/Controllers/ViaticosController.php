<?php

namespace App\Http\Controllers;

use App\t_viaticos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ViaticosController extends Controller
{

    public function index()
    {
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $Viaticos = DB::table('t_viaticos')->get();
        return view('Viaticos', ['t_viaticos' => $Viaticos]);
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
        $agregar = new t_viaticos();
        $agregar->tipo_de_vehiculo = $request->tipo_de_vehiculo;
        $agregar->antiguedad_vehiculo_años = $request->antiguedad_vehiculo_años;
        $agregar->tarifa_km_recorrido = $request->tarifa_km_recorrido;
        $agregar->km_recorridos = $request->km_recorridos;
        $agregar->total_km = $agregar->tarifa_km_recorrido * $agregar->km_recorridos;
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'Viatico se ha agregado');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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
    public function destroy($id)
    {
        //
    }
}
