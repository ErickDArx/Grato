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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_producto)
    {
        // date_default_timezone_set('America/Costa_Rica');
        $producto = t_producto::findOrFail($id_producto);
        // $recursos = DB::table('t_materia_prima')->get();
        // $operario = DB::table('t_mano_de_obra')->get();
        // $costo = t_costo_unitario::findOrFail($id_producto);
        // return view('modulos/CostoUnitario', compact('producto'));
        return view('modulos/CostoUnitario', compact('producto'));
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
        //
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
    public function destroy($id)
    {
        //
    }
}
