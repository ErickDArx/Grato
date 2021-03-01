<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_usuario;
use Carbon\Carbon;

class PerfilController extends Controller
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
        return view('Perfil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $agregar->apellido_usuario = $request->apellido_usuario;
        $agregar->correo = $request->correo;
        $agregar->password = bcrypt($request->password);
        $agregar->roll = 0;
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
        return view('Perfil', compact('edit'));
    }


    public function update(Request $request, $id_usuario)
    {
        $edit = t_usuario::findOrFail($id_usuario);
        $edit->nombre_usuario = $request->nombre_usuario;
        $edit->apellido_usuario = $request->apellido_usuario;
        $edit->save();
        return back()->with('Perfil','Todo salio bien');
    }

    public function update_correo(Request $request, $id_usuario)
    {
        $edit = t_usuario::findOrFail($id_usuario);
        $edit->correo = $request->correo;
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
