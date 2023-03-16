<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPermisoLicencia;

class TipoPermisoLicenciaController extends Controller
{
    public function index()
    {

        $tipopermisolicencia = TipoPermisoLicencia::all();
        return view('tipopermisolicencia.index', compact('tipopermisolicencia'));
    }

    public function create()
    {
        return view('tipopermisolicencia.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',

        ]);
        $tipopermisolicencia = new TipoPermisoLicencia();
        $tipopermisolicencia->nombre = $request->input('nombre');
        $tipopermisolicencia->tipo = $request->input('tipo');
        $tipopermisolicencia->save();
        return redirect()->route('tipopermisolicencia.index', compact('tipopermisolicencia'));
    }


    public function show($id)
    {
        $tipopermisolicencia = TipoPermisoLicencia::findOrFail($id);
        return view('tipopermisolicencia.show', compact('tipopermisolicencia'));
    }

    public function edit($id)
    {
        $tipopermisolicencia = TipoPermisoLicencia::findOrFail($id);
        $tipopermisolicencia->save();
        return view('tipopermisolicencia.edit', compact('tipopermisolicencia'));
    }

    public function update(Request $request, $id)
    {
        $tipopermisolicencia = TipoPermisoLicencia::findOrFail($id);
        $tipopermisolicencia->nombre = $request->input('nombre');
        $tipopermisolicencia->tipo = $request->input('tipo');
        $tipopermisolicencia->save();
        return redirect()->route('tipopermisolicencia.index');
    }



    public function destroy($id)
    {
        $tipopermisolicencia = TipoPermisoLicencia::findOrFail($id);
        $tipopermisolicencia->delete();
        return redirect()->route('tipopermisolicencia.index');
    }
}
