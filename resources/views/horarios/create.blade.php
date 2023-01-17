@extends('plantilla.app')

@section('content_header')
    <a class="btn btn-secundary" href="{{ route('horarios.index') }}">Volver</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Registrar Horario
                    </div>
                    <div class="card-body">
                        <form action="{{ route('horarios.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="hora_ingreso">Hora de Ingreso</label>
                                <input type="time" name="hora_ingreso" id="hora_ingreso" class="form-control"
                                    value="{{ old('hora_ingreso') }}">
                                @error('hora_ingreso')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hora_salida">Hora de Salida</label>
                                <input type="time" name="hora_salida" id="hora_salida" class="form-control"
                                    value="{{ old('hora_salida') }}">
                                @error('hora_salida')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="horas_mensuales">Horas Mensuales</label>
                                <input type="number" name="horas_mensuales" id="horas_mensuales" class="form-control"
                                    value="{{ old('horas_mensuales') }}">
                                @error('horas_mensuales')
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
