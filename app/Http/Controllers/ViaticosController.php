<?php

namespace App\Http\Controllers;

use App\t_viaticos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViaticosController extends Controller
{

    public function index()
    {
        $Viaticos = DB::table('t_viaticos')->get();
        return view('modulos/Viaticos', ['t_viaticos' => $Viaticos]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'tipo_de_vehiculo' => 'required|string',
            'antiguedad_vehiculo_años' => 'required|string',
            'tarifa_km_recorrido' => 'required|numeric|min:1',
            'km_recorridos' => 'required|numeric|min:1',
        ],[

        ]);
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

    public function update(Request $request, $id_viatico)
    {
        request()->validate([
            'ava' => 'required|numeric',
            'tkr' => 'required|numeric|min:1',
            'kr' => 'required|numeric|min:1',
        ],[

        ]);
        $edit = t_viaticos::findOrFail($id_viatico);
        $edit->antiguedad_vehiculo_años = $request->ava;
        $edit->tarifa_km_recorrido = $request->tkr;
        $edit->km_recorridos = $request->kr;
        $edit->save();
        return back();
    }

    public function destroy($id_viatico)
    {
        $delete = t_viaticos::findOrFail($id_viatico);
        $delete->destroy($id_viatico);
        return back();
    }
}
