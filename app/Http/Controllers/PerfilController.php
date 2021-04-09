<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_usuario;
use Carbon\Carbon;

class PerfilController extends Controller
{

    public function index()
    {
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $date->diffForHumans();
        return view('usuarios/Perfil');
    }

    public function create()
    {

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
        $agregar = new t_usuario;
        $agregar->nombre_usuario = $request->nombre_usuario;
        $agregar->nombre_operario = $request->nombre_operario;
        $agregar->apellido_usuario = $request->apellido_usuario;
        $agregar->segundo_apellido_usuario = $request->segundo_apellido_usuario;
        $agregar->email = $request->correo;
        $agregar->password = bcrypt($request->password);
        $agregar->rol = 0;
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


    public function editar($id_usuario)
    {
        $edit = t_usuario::findOrFail($id_usuario);
        return view('usuarios\Perfil', compact('edit'));
    }


    public function update(Request $request, $id_usuario)
    {
        request()->validate([
            'nombre_operario' => 'required|regex:/^[a-zA-Z\s]+$/u',
            'apellido_usuario' => 'required|regex:/^[a-zA-Z\s]+$/u',
            'segundo_apellido_usuario' => 'regex:/^[a-zA-Z\s]+$/u',
            'nombre_usuario' => 'required | unique:t_usuario,nombre_usuario',
        ],[
            'nombre_operario.required' => 'El campo no puede estar vacio',

        ]);
        $edit = t_usuario::findOrFail($id_usuario);
        $edit->nombre_usuario = $request->nombre_usuario;
        $edit->nombre_operario = $request->nombre_operario;
        $edit->apellido_usuario = $request->apellido_usuario;
        $edit->segundo_apellido_usuario = $request->segundo_apellido_usuario;
        $edit->save();
        return back()->with('Perfil','Todo salio bien');
    }

    public function update_correo(Request $request, $id_usuario)
    {
        $edit = t_usuario::findOrFail($id_usuario);
        $edit->email = $request->correo;
        $edit->save();
        return back()->with('Perfil','Todo salio bien');
    }

    public function delete_asistente( $id_usuario)
    {
        $eliminar = t_usuario::findOrFail($id_usuario);
        $eliminar -> delete();
        return back()->with('eliminar','El asistente fue eliminado exitosamente');

    }

    public function destroy($id_usuario)
    {

    }


}
