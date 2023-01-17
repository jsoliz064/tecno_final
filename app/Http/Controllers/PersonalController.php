<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\TipoPersonal;
use App\Models\User;


class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::all();
        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        $tipos = TipoPersonal::all();
        $users = User::whereNotIn('id',User::select('users.id')->join('p2_personal','p2_personal.user_id','users.id')->get())->get();

        return view('personal.create', compact('tipos','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'estado_civil' => 'required',
            'tipo_personal_id' => 'required',
            //'user_id' => 'required',
        ]);

        $personal = Personal::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'estado_civil' => $request->estado_civil,
            'tipo_personal_id' => $request->tipo_personal_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('personal.index')->with('success', 'Personal created successfully');
    }

    public function edit($id)
    {
        $personal = Personal::find($id);
        $tipos = TipoPersonal::all();

        $user_id=$personal->user_id?$personal->user_id:0;
        $userOcupados=User::select('users.id')->join('p2_personal','p2_personal.user_id','users.id')->where('users.id','<>',$user_id)->get();
        $users = User::whereNotIn('id',$userOcupados)->get();

        return view('personal.edit', compact('personal', 'tipos','users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'estado_civil' => 'required',
            'tipo_personal_id' => 'required',
            //'user_id' => 'required',
        ]);

        $personal = Personal::find($id);
        $personal->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'estado_civil' => $request->estado_civil,
            'tipo_personal_id' => $request->tipo_personal_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('personal.index')->with('success', 'Personal updated successfully');
    }
    public function destroy($id)
    {
        $personal = Personal::find($id);
        $personal->delete();
        return redirect()->route('personal.index')->with('success', 'Personal deleted successfully');
    }
}
