<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {   //               ('can:materias.index') aprobando permiso, ->only('index') solo para el metodo index
        // $this->middleware('can:users.index')->only('index');
        // $this->middleware('can:users.create')->only('create', 'store');
        // $this->middleware('can:users.edit')->only('edit', 'update');
        // $this->middleware('can:publico')->only('show2', 'update2');
        // $this->middleware('can:users.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
       // date_default_timezone_set("America/La_Paz");
       //return $request;
        $users=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'profile_url'=>"imagenes/sin-perfil.jpg",
            //'password' =>$request['password'], no oculta contraseña
        ]);
        
        //se agrega un rol al usuario
        if($request->roles > 0){
            $users->roles()->sync($request->roles);
            $users->save();
        }

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function show2()
    {
        $user=User::find(auth()->user()->id);
        return view('user.edit',compact('user'));
    }
    public function update2(Request $request)
    {
        date_default_timezone_set("America/La_Paz");

        $user=User::find(auth()->user()->id);
       //actualiza nombre
       if($user->name <> $request->name){
            $user->name = $request->name;
        }
        //actualiza email
        if($user->email <> $request->email){
            $user->email = $request->email;
        }
        //actualiza contraseña
        if($request->password <> ''){
            $user->password =password_hash($request->password,PASSWORD_DEFAULT);
        }

        $user->save();
        return redirect()->route('user.show')->with('info', 'Se actualizo correctamente');
    }


    public function edit(User $user)
    {
        if ($user->id==2 && $user->id !== auth()->user()->id){
            return redirect()->route('users.index')->with('error', 'No Puedes Editar los datos del Admin');
        }

        $roles = Role::all();
        return view('users.edit',compact('user', 'roles') );
 
    }

    public function update(Request $request, User $user)
    {
        if ($user->id==2 && $user->id !== auth()->user()->id){
            return redirect()->route('users.edit', $user)->with('error', 'No Puedes Editar los datos del Admin');
        }
        //actualiza nombre
        if($user->name <> $request->name){
            $user->name = $request->name;
        }
        //actualiza contraseña
        if($request->password <> ''){
            $user->password = bcrypt($request->password);
        }

        if($user->email <> $request->email)
            $user->email = $request->email;
        //actualiza los roles
        if($request->roles > 0 ){
            $user->roles()->sync($request->roles);
        }           
        $user->save(); //guardar cambios de usuario 
        return redirect()->route('users.edit', $user)->with('info', 'se actualizo el usuario correctamente');
    }

    public function destroy(User $user)
    {
        if ($user->id==2 && $user->id !== auth()->user()->id){
            return redirect()->route('users.index')->with('error', 'No Puedes eliminar al Admin de Admins');
        }

        $user->delete();
        return redirect()->route('users.index');
    }
}
