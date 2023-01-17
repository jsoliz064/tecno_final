@extends('plantilla.app')

@section('content_header')
    <a class="btn btn-secundary" href="{{ route('certificados.index') }}">Volver</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Registrar Certificado
                    </div>
                    <div class="card-body">
                        <form action="{{ route('certificados.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control"
                                    value="{{ old('fecha_inicio') }}">
                                @error('fecha_inicio')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fecha_fin">Fecha Final</label>
                                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control"
                                    value="{{ old('fecha_fin') }}">
                                @error('fecha_fin')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="personal_id">Personal</label>
                                <select name="personal_id" id="personal_id" class="form-control">
                                    <option value="">Seleccione un tipo</option>
                                    @foreach ($personal as $person)
                                        <option value="{{ $person->id }}"
                                            {{ old('personal_id') == $person->id ? 'selected' : '' }}>
                                            {{ $person->nombre }} {{ $person->apellido }}</option>
                                    @endforeach
                                </select>
                                @error('personal_id')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
