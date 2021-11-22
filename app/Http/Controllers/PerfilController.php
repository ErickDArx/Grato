<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_usuario;

class PerfilController extends Controller
{

    // Funcion que llama a la vista Perfil y envia los datos 
    // de los modelos seleccionados
    public function index()
    {
        return view('usuarios/Perfil');
    }

    // Funcion para actualizar la tarejta de Perfil
    public function update(Request $request, $id_usuario)
    {
        // Validaciones y mensajes personalizados
        request()->validate([
            'nombre_operario' => 'required|alpha|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellido_usuario' => 'required|alpha|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'segundo_apellido_usuario' => 'required|alpha|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
        ], [
            'nombre_operario.required' => 'El campo no puede quedar vacio',
            'apellido_usuario' => 'El campo no puede quedar vacio',
            'segundo_apellido_usuario' => 'El campo no puede quedar vacio',
        ]);
        // Actualizar segun el ID del usuario
        $edit = t_usuario::findOrFail($id_usuario);
        $edit->nombre_operario = $request->nombre_operario;
        $edit->apellido_usuario = $request->apellido_usuario;
        $edit->segundo_apellido_usuario = $request->segundo_apellido_usuario;
        $edit->save();
        // Redirigir a la vista original
        return back();
    }

    // Funcion para actualizar el nombre de usuario segun el ID
    public function update_usuario(Request $request, $id_usuario)
    {
        // Validaciones y mensajes personalizados
        request()->validate([
            'nombre_usuario' => 'required | alpha_dash |  unique:t_usuario,nombre_usuario',
        ]);
        // Actualizar segun el ID del usuario
        $editar = t_usuario::findOrFail($id_usuario);
        $editar->nombre_usuario = $request->nombre_usuario;
        $editar->save();
        // Redirigir a la vista original
        return back();
    }

    //Funcion para actualizar el correo electronico
    public function update_correo(Request $request, $id_usuario)
    {
        //Validaciones para el correo
        request()->validate([
            'correo' => 'required|email|unique:t_usuario,email|max:255'
        ]);
        //Hallar la id del usuario
        $edit = t_usuario::findOrFail($id_usuario);
        $edit->email = $request->correo;
        //Guardar cambios
        $edit->save();
        //Retornar a la vista original
        return back();
    }

    //Funcion para eliminar el usuario de acuerdo a su ID
    public function delete_asistente($id_usuario)
    {
        //Verificamos si existe el ID
        $eliminar = t_usuario::findOrFail($id_usuario);
        //Borrar el campo con el ID
        $eliminar->delete();
        //Retornar a la vista original
        return back();
    }
}
