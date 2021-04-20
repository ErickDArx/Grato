<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_producto;
use App\t_materia_prima;

class PedidosController extends Controller
{
    //Funcion para visualizar la vista de Pedidos
    public function index(Request $request)
    {
        //Obtener el parametro enviado por el formulario
        $buscador = $request->get('busqueda');
        //Obtener los datos de la tabla de materia prima y producto
        $materia = t_materia_prima::orderBy('id_materia_prima', 'DESC')->get();
        $producto = t_producto::orderBy('nombre_producto', 'ASC')
            ->Busqueda($buscador)
            ->paginate(5);

        //Retornar a la vista 
        return view('modulos/Pedidos', ['t_materia_prima' => $materia, 't_producto' => $producto]);
    }
}
