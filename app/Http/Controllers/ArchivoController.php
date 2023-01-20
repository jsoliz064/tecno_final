<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\Personal;
use Illuminate\Support\Facades\Storage;


class ArchivoController extends Controller
{
    public function index()
    {
        $archivos = Archivo::all();

        return view('archivos.index', compact('archivos'));
    }
    public function create()
    {
        $personals = Personal::all();
        return view('archivos.create', compact('personals'));
    }
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'archivo' => 'required|file',
            'personal_id' => 'required',
        ]);

        $file = $request->file('archivo');
        $url = null;
        if ($file) {
            $path = public_path() . '/documents/';
            $imageName = "archivo" . uniqid() . "." . $file->extension();
            $file->move($path, $imageName);
            $url="documents/".$imageName;
        }

        Archivo::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'link' => $url,
            'personal_id' => $request->personal_id,
        ]);
        return redirect()->route('archivos.index')->with('info', 'El archivo se creo correctamente');
    }
    public function edit(Archivo $archivo)
    {
        $personals = Personal::all();
        return view('archivos.edit', compact('personals', 'archivo'));
    }
    public function update(Request $request, Archivo $archivo)
    {
        date_default_timezone_set("America/La_Paz");

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'personal_id' => 'required',
        ]);

        $file = $request->file('archivo');
        if ($file) {
            if ($archivo->link){
                $ruta = public_path($archivo->link);
                if (file_exists($ruta)) {
                    unlink($ruta);
                }
            }

            $path = public_path() . '/documents/';
            $imageName = "archivo" . uniqid() . "." . $file->extension();
            $file->move($path, $imageName);
            $url="documents/".$imageName;

            $archivo->update([
                'link' => $url,
            ]);
        }



        $archivo->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'personal_id' => $request->personal_id,
        ]);

        return redirect()->route('archivos.index')->with('info', 'El archivo se actualizo correctamente');
    }
    public function destroy(Archivo $archivo)
    {
       
        if ($archivo->link){
            $ruta = public_path($archivo->link);
            if (file_exists($ruta)) {
                unlink($ruta);
            }
        }
        $archivo->delete();
        return redirect()->route('archivos.index')->with('info', 'El archivo se elimino correctamente');
    }
}
