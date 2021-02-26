<?php

namespace App\Http\Controllers;

use App\t_usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getLogin(){
         return view('Acceso');
     }
     public function postLogin(){
        $rules=[
            'password'=>'required|min:8'
        ];
     }
     public function getRegister(){
         return view('Perfil');
     }

     public function postRegister(){
         $rules=[
             'password'=>'required|min:8'
         ];
     }

    public function index()
    {
        return view('Acceso');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\t_usuario  $t_usuario
     * @return \Illuminate\Http\Response
     */
    public function show(t_usuario $t_usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\t_usuario  $t_usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(t_usuario $t_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\t_usuario  $t_usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, t_usuario $t_usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\t_usuario  $t_usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(t_usuario $t_usuario)
    {
        //
    }
}
