@extends('plantilla.app')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PATCH')

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Nombre de usuario</b></label>
                    <input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}"
                        id="name">
                    @error('name')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="check_password"><b>Nueva contraseña</b></label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                        id="passwordInput" placeholder="Escriba si modificara ">
                    @error('password')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Nuevo email</b></label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                        id="email">
                    @error('email')
                        <small>{{ $message }}</small>
                        <br><br>
                    @enderror
                </div>

                <div class="form-group col-md-6 my-3">
                    <label for="name"><b>Seleccione un Rol</b></label>
                    <select name="roles" class="form-control col-md-6" id="select-roles">
                        <option value="{{ $user->rol_id() }}">{{ $user->rol_name() }}</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Actualizar Usuario</button>
                <a href="{{ route('users.index') }}"class="btn btn-warning mt-2">Volver</a>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/home.css">
@stop

@section('js')

@stop
