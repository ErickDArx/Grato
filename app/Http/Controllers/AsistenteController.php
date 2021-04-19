<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AsistenteController extends Controller
{

    public function index(Request $request)
    {
        //Busqueda del nombre
        $busqueda = $request->get('busqueda');

        //Zona horaria e idioma español
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $date->diffForHumans();

        //Muestreme los datos de la tabla t_usuario, de forma que su sus nombre_operario de vean de forma descendiente
        //Ejecutar la busqueda
        //Paginacion 
        $usuarios = t_usuario::orderBy('nombre_operario','DESC')
        ->Busqueda($busqueda)
        ->paginate(6);
        return view('usuarios/Asistentes', ['t_usuario' => $usuarios]);
    }

    public function destroy($id_usuario)
    {
    //Buscar parametro dentro de la tabla, segun el id_usuario
    $eliminar = t_usuario::findOrFail($id_usuario);
    $eliminar -> delete();
    return back()->with('eliminar','El asistente fue eliminado exitosamente');
    }
}
