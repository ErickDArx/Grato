<?php

namespace App\Http\Controllers;

use App\t_mano_de_obra;
use App\t_labores;
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
        $laborales = DB::table('t_labores')->get();
        return view('modulos/ManoObra', ['t_usuario' => $users, 't_mano_de_obra' => $operarios, 't_labores' => $laborales]);
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
        if($request->ajax()){
        $agregar = new t_mano_de_obra();
        $agregar->nombre_trabajador = $request->nombre_trabajador;
        $agregar->apellido_trabajador = $request->apellido_trabajador;
        $agregar->salario_mensual = $request->salario_mensual;
        $agregar->salario_semanal = $request->salario_mensual / 4.33;
        $agregar->salario_diario = $agregar->salario_semanal / $request->dias_laborales_semana;
        $agregar->salario_hora = $agregar->salario_diario / $request->horas_laborales_dia;
        $agregar->salario_minuto = $agregar->salario_hora / 60;
        $agregar->salario_costo_extra = 100;
        $agregar->salario_costo_hora_doble = 100;

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
    public function update(Request $request, $id_mano_de_obra)
    {
        // if($request->ajax()){
        $agregar = t_mano_de_obra::findOrFail($id_mano_de_obra);
            $agregar->nombre_trabajador = $request->nombre_trabajador;
            $agregar->apellido_trabajador = $request->apellido_trabajador;
            $agregar->salario_mensual = $request->salario_mensual;
            $agregar->salario_semanal = $request->salario_mensual / 4.33;
            $agregar->salario_diario = $agregar->salario_semanal / $request->dias_laborales_semana;
            $agregar->salario_hora = $agregar->salario_diario / $request->horas_laborales_dia;
            $agregar->salario_minuto = $agregar->salario_hora / 60;
            $agregar->salario_costo_extra = 100;
            $agregar->salario_costo_hora_doble = 100;
            // Insertar en la base de datos
            $agregar->save();
            // Redirigir a la vista original 
            return back()->with('agregar', 'El usuario se ha agregado');
        //     return response()->json($agregar->toArray());
        // }
    }

    public function labor(Request $request, $id_labor)
    {
        $editar = t_labores::findOrFail($id_labor);
        $editar->dias_laborales_semana = $request->dias_laborales_semana;
        $editar->horas_laborales_dia = $request->horas_laborales_dia;
        $editar->save();
        return back()->with('editar', 'La actualizacion tuvo exito');
    }

    public function delete(Request $request, $id_mano_de_obra)
    {

        $eliminar = t_mano_de_obra::findOrFail($id_mano_de_obra);
        $eliminar->delete();
        // return response()->json([
        //     'success' => 'Record has been deleted successfully!'
        // ]);
        return back()->with('eliminar', 'El asistente fue eliminado exitosamente');
    }
}
