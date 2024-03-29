@extends('plantilla.app')

@section('content_header')
    <a class="btn btn-secundary" href="{{route('personal.index')}}">Volver</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Personal
                    </div>
                    <div class="card-body">
                        <form action="{{ route('personal.update', $personal->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control"
                                    value="{{ old('nombre', $personal->nombre) }}">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control"
                                    value="{{ old('apellido', $personal->apellido) }}">
                            </div>
                            <div class="form-group">
                                <label for="ci">Carnet de Identidad</label>
                                <input type="text" name="ci" id="ci" class="form-control"
                                    value="{{ old('ci', $personal->ci) }}">
                            </div>
                            <div class="form-group">
                                <label for="genero">Genero</label>
                                <select name="genero" id="genero" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="M" {{ old('genero', $personal->genero) === 'M' ? 'selected' : '' }}>
                                        Masculino</option>
                                    <option value="F" {{ old('genero', $personal->genero) === 'F' ? 'selected' : '' }}>
                                        Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                                    value="{{ old('fecha_nacimiento', $personal->fecha_nacimiento) }}">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" name="correo" id="correo" class="form-control"
                                    value="{{ old('correo', $personal->correo) }}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control"
                                    value="{{ old('telefono', $personal->telefono) }}">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control"
                                    value="{{ old('direccion', $personal->direccion) }}">
                            </div>
                            <div class="form-group">
                                <label for="estado_civil">Estado Civil</label>
                                <input type="text" name="estado_civil" id="estado_civil" class="form-control"
                                    value="{{ old('estado_civil', $personal->estado_civil) }}">
                            </div>
                            <div class="form-group">
                                <label for="tipo_personal_id">Tipo de Personal</label>
                                <select name="tipo_personal_id" id="tipo_personal_id" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}"
                                            {{ old('tipo_personal_id', $personal->tipo_personal_id) == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="horario_id">Horario (opcional)</label>
                                <select name="horario_id" id="horario_id" class="form-control">
                                    <option value="">Seleccione un horario</option>
                                    @foreach ($horarios as $horario)
                                        <option value="{{ $horario->id }}"
                                            {{ old('horario_id',$personal->horario_id) == $horario->id ? 'selected' : '' }}>
                                            Entrada: {{ $horario->hora_ingreso }}, Salida: {{ $horario->hora_salida }}, Horas Mensuales: {{ $horario->horas_mensuales}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="user_id">Usuario (Opcional)</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Seleccione un usuario</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $personal->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} - {{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
