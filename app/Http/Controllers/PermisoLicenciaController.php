<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermisoLicencia;

class PermisoLicenciaController extends Controller
{
    public function index()
    {

        $permisolicencia = PermisoLicencia::all();
        return view('permisolicencia.index', compact('permisolicencia'));
    }

    public function create()
    {
        return view('permisolicencia.create');
    }


    public function store(Request $request)
    {
        //validacion para que sea requerido
        $request->validate([
            'fecha' => 'required',
            'docuemnto' => 'required',
            'dias_habiles' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'id_personal' => 'required',
            'id_tipo' => 'required',
        ]);

        //crea el medico atributo por atributo
        $permisolicencia = new PermisoLicencia();
        $permisolicencia->fecha = $request->input('name');
        $permisolicencia->documento = $request->input('ci');
        $permisolicencia->dias_habiles = $request->input('foto');
        $permisolicencia->fecha_inicio = $request->input('genero');
        $permisolicencia->fecha_fin = $request->input('contacto');
        $permisolicencia->id_personal = $request->input('fnacimiento');
        $permisolicencia->id_tipo = $request->input('direccion');
        $permisolicencia->save();

        return redirect()->route('permisolicencia.index', compact('permisolicencia'));
    }


    public function show($id)
    {
        $permisolicencia = PermisoLicencia::findOrFail($id);
        return view('permisolicencia.show', compact('permisolicencia'));
    }

    public function edit($id)
    {
        $permisolicencia = PermisoLicencia::findOrFail($id);
        $permisolicencia->save();
        return view('permisolicencia.edit', compact('permisolicencia'));
    }

    public function update(Request $request, $id)
    {
        $permisolicencia = Paciente::findOrFail($id);
        $permisolicencia->fecha = $request->input('fecha');
        $permisolicencia->documento = $request->input('documento');
        $permisolicencia->dias_habiles = $request->input('dias_habiles');
        $permisolicencia->fecha_inicio = $request->input('fecha_inicio');
        $permisolicencia->fecha_fin = $request->input('fecha_fin');
        $permisolicencia->id_personal = $request->input('id_personal');
        $permisolicencia->id_tipo = $request->input('id_tipo');
        $permisolicencia->save();
        return redirect()->route('permisolicencia.index');
    }



    public function destroy($id)
    {
        $permisolicencia = PermisoLicencia::findOrFail($id);
        $permisolicencia->delete();
        return redirect()->route('permisolicencia.index');
    }
}
