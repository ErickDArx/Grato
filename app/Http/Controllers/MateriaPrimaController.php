<?php

namespace App\Http\Controllers;

use App\t_materia_prima;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MateriaPrimaController extends Controller
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
        $materia = DB::table('t_materia_prima')->get();

        return view('MateriaPrima', ['t_materia_prima' => $materia]);
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

            $agregar = new t_materia_prima();
            $agregar->producto = $request->producto;
            $agregar->unidad_medida= $request->unidad_medida;
            $agregar->presentacion = $request->presentacion;
            $agregar->cantidad = $request->cantidad;
            $agregar->costo = $request->costo;
            $agregar->precio_um = $agregar->costo * $agregar->unidad_medida;

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
