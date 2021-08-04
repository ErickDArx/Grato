<?php

namespace App\Http\Controllers;

use App\t_cif;
use Illuminate\Http\Request;

class CifController extends Controller
{

    // Funcion que muestra la vista y los modelos que se muestran
    public function index(Request $request)
    {
        //Obtener el parametro enviado por el formulario
        $busqueda = $request->get('busqueda');
        //Obtener los datos de la tabla CIF
        $cif = t_cif::orderBy('nombre_cif', 'ASC')
            ->Busqueda($busqueda)
            ->paginate(6);
        return view('modulos/CIF', ['t_cif' => $cif]);
    }

    //Funcion que almacena el CIF y lo valida
    public function store(Request $request)
    {
        //Validaciones y mensajes personalizados
        request()->validate([
            'nombre_cif' => 'required | alpha | unique:t_cif,nombre_cif',
        ], [
            'nombre_cif.required' => 'El campo: Titulo del CIF, no puede quedar vacio',
            'nombre_cif.alpha' => 'El campo: Titulo del CIF, solo puede contener letras',
            'nombre_cif.unique' => 'El valor del campo: Titulo del CIF ya se encuentra en uso',
        ]);
        // Agregar nuevo CIF 
        $agregar = new t_cif();
        $agregar->nombre_cif = $request->nombre_cif;
        // Insertar en la base de datos
        $agregar->save();
        // Returnar a la vista original
        return back();
    }

    // Funcion que actualiza el CIF de acuerdo al ID
    public function update(Request $request, $id_cif)
    {
        //Validaciones y mensajes personalizados
        request()->validate([
            'nombre_cif' => 'required | alpha | unique:t_cif,nombre_cif',
        ], [
            'nombre_cif.required' => 'El campo: Titulo del CIF, no puede quedar vacio',
            'nombre_cif.alpha' => 'El campo: Titulo del CIF, solo puede contener letras',
            'nombre_cif.unique' => 'El valor del campo: Titulo del CIF ya se encuentra en uso',

        ]);

        // Buscamos el registro que coincida con el ID del parametro
        $agregar = t_cif::findOrFail($id_cif);
        $agregar->nombre_cif = $request->nombre_cif;
        // Insertar en la base de datos
        $agregar->save();
        //Retornar a la vista original
        return back();
    }

    //Funcion que eliminar el CIF de acuerdo al ID
    public function destroy($id_cif)
    {
        // Buscamos el registro que coincida con el ID del parametro
        $eliminar = t_cif::findOrFail($id_cif);
        //Ejecutamos la eliminacion
        $eliminar->delete();
        //Retornar a la vista original
        return back();
    }
}
