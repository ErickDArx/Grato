<?php

namespace App\Http\Controllers;

use App\t_costo_unitario;
use Illuminate\Http\Request;
use App\t_producto;
use App\t_materia_prima;
use App\t_mano_de_obra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $buscador = $request->get('busqueda');
        $costos = DB::table('t_costo_unitario')->get();
        $materia = t_materia_prima::orderBy('id_materia_prima', 'DESC')->get();
        $producto = t_producto::orderBy('nombre_producto', 'ASC')
            ->paginate(5);

        return view('modulos/Pedidos', ['t_materia_prima' => $materia, 't_producto' => $producto]);
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
        $store = new t_costo_unitario();
        $store->fecha = Carbon::now();
        $store->id_producto = 1;
        $store->id_materia_prima = 1;
        $store->id_mano_de_obra = $request->id_mano_de_obra;
        $store->id_equipo = 1;
        $store->save();
        return back()->with('store', '');
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
