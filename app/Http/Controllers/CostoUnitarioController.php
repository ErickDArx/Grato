<?php

namespace App\Http\Controllers;

use App\t_costo_unitario;
use Illuminate\Http\Request;
use App\t_producto;
use App\t_materia_prima;
use App\t_mano_de_obra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CostoUnitarioController extends Controller
{

    public function index($id_producto)
    {
        date_default_timezone_set('America/Costa_Rica');
        $producto = t_producto::findOrFail($id_producto);
        $unitario = DB::table('t_costo_unitario')->get();
        $recursos = DB::table('t_materia_prima')->get();
        $operario = DB::table('t_mano_de_obra')->get();
        $equipo = DB::table('t_equipos')->get();
        $cif = DB::table('t_valores')->get();
        $viaticos = DB::table('t_viaticos')->get();

        // $costo = t_costo_unitario::findOrFail($id_producto);
        // return view('modulos/CostoUnitario', compact('producto'));}
        return view('modulos/CostoUnitario', compact('producto'), ['t_materia_prima' => $recursos, 't_mano_de_obra' => $operario, 't_costo_unitario'=>$unitario, 't_equipos' =>$equipo, 't_valores'=>$cif, 't_viaticos'=>$viaticos]);
    }

    public function operario(Request $request, $id_producto)
    {
        request()->validate([
            'id_mano_de_obra' => 'required | unique:t_costo_unitario,id_mano_de_obra',
        ]);

        $agregar = new t_costo_unitario();
        $agregar->id_producto = $id_producto;
        $agregar->id_mano_de_obra = $request->id_mano_de_obra;
        $agregar->fecha = Carbon::now();
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function equipo(Request $request, $id_producto)
    {
        request()->validate([
            'id_equipo' => 'required | unique:t_costo_unitario,id_equipo',
        ]);

        $agregar = new t_costo_unitario();
        $agregar->id_producto = $id_producto;
        $agregar->id_equipo = $request->id_equipo;
        $agregar->fecha = Carbon::now();
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

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
    public function destroy($id)
    {
        //
    }
}
