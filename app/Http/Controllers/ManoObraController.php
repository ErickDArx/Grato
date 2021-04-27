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
    public function index(Request $request)
    {
        // Buscador
        $busqueda = $request->get('busqueda');
        
        // Zona horaria e idioma Español
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');

        //Obtengo los datos de la base de datos
        $users = DB::table('t_usuario')->get();
        $operarios = t_mano_de_obra::orderBy('nombre_trabajador', 'DESC')
        ->busqueda($busqueda)
        ->paginate(6);

        $laborales = DB::table('t_labores')->get();
        return view('modulos/ManoObra', ['t_usuario' => $users, 't_mano_de_obra' => $operarios, 't_labores' => $laborales]);
    }

    public function store(Request $request)
    {

        // Validaciones
        request()->validate([
            'nombre_trabajador' => 'required|string|min:3|alpha',
            'apellido_trabajador' => 'required|string|min:3|alpha',
            'salario_mensual' => 'required|numeric|min:1|max:999999999',
        ]);

        // Agregar en la base de datos
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
        return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function update(Request $request, $id_mano_de_obra)
    {
        request()->validate([
            'salario_mensual' => 'required|numeric|min:1|max:999999999',
        ]);

        $agregar = t_mano_de_obra::findOrFail($id_mano_de_obra);
        $agregar->salario_mensual = $request->salario_mensual;
        $agregar->salario_semanal = $request->salario_mensual / 4.33;
        $agregar->salario_diario = $agregar->salario_semanal / $request->dias_laborales_semana;
        $agregar->salario_hora = $agregar->salario_diario / $request->horas_laborales_dia;
        $agregar->salario_minuto = $agregar->salario_hora / 60;
        $agregar->salario_costo_extra = 100;
        $agregar->salario_costo_hora_doble = 100;
        $agregar->costo_minuto = $request->minutos * $agregar->salario_minuto;
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back();
    }


    public function labor(Request $request, $id_labor)
    {
        request()->validate([
            'dias_laborales_semana' => 'required|numeric|min:1|max:7',
            'horas_laborales_dia' => 'required|numeric|min:1',
        ]);
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
