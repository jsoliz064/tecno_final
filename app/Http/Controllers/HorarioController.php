<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();

        return view('horarios.index', compact('horarios'));
    }
    public function create()
    {
        return view('horarios.create');
    }
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");

        $request->validate([
            'hora_ingreso' => 'required',
            'hora_salida' => 'required',
            'horas_mensuales' => 'required',
        ]);

        Horario::create([
            'hora_ingreso' => $request->hora_ingreso,
            'hora_salida' => $request->hora_salida,
            'horas_mensuales' => $request->horas_mensuales,
        ]);
        return redirect()->route('horarios.index')->with('info', 'El horario se registro correctamente');
    }
    public function edit(Horario $horario)
    {
        return view('horarios.edit', compact( 'horario'));
    }
    public function update(Request $request, Horario $horario)
    {
        date_default_timezone_set("America/La_Paz");

        $request->validate([
            'hora_ingreso' => 'required',
            'hora_salida' => 'required',
            'horas_mensuales' => 'required',
        ]);

        $horario->update([
            'hora_ingreso' => $request->hora_ingreso,
            'hora_salida' => $request->hora_salida,
            'horas_mensuales' => $request->horas_mensuales,
        ]);

        return redirect()->route('horarios.index')->with('info', 'El horario se actualizo correctamente');
    }
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('info', 'El horario se elimino correctamente');
    }
}
