<?php

namespace App\Http\Controllers;
use App\t_cif;
use App\t_mes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CifController extends Controller
{

    public function index()
    {
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $cif = DB::table('t_cif')->get();
        return view('modulos/CIF' , ['t_cif' => $cif]);
    }

    public function create(Request $request, $id_cif)
    {

    }

    public function store(Request $request)
    {
        request()->validate([
            'nombre_cif' => 'required | alpha | unique:t_cif,nombre_cif',
        ],[
            'nombre_cif.required' => 'El campo: Titulo del CIF, no puede quedar vacio',
            'nombre_cif.alpha' => 'El campo: Titulo del CIF, solo puede contener letras',
            'nombre_cif.unique' => 'El valor del campo: Titulo del CIF ya se encuentra en uso',

        ]);

        $agregar = new t_cif();
        $agregar->nombre_cif = $request->nombre_cif;
        // Insertar en la base de datos
        $agregar->save();
        return back()->with('agregar', 'El nombre del CIF se ha agregado exitosamente!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id_cif)
    {

    }

    public function update(Request $request, $id_cif)
    {
        request()->validate([
            'nombre_cif' => 'required | alpha | unique:t_cif,nombre_cif',
        ],[
            'nombre_cif.required' => 'El campo: Titulo del CIF, no puede quedar vacio',
            'nombre_cif.alpha' => 'El campo: Titulo del CIF, solo puede contener letras',
            'nombre_cif.unique' => 'El valor del campo: Titulo del CIF ya se encuentra en uso',

        ]);

        $agregar = t_cif::findOrFail($id_cif);
        $agregar->nombre_cif = $request->nombre_cif;
        // Insertar en la base de datos
        $agregar->save();
        return back()->with('agregar', 'El nombre del CIF se ha agregado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cif)
    {
        $eliminar = t_cif::findOrFail($id_cif);
        $eliminar->delete();
        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
