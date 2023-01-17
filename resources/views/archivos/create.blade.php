@extends('plantilla.app')

@section('content_header')
    <a class="btn btn-secundary" href="{{ route('archivos.index') }}">Volver</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Registrar Archivo
                    </div>
                    <div class="card-body">
                        <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control"
                                    value="{{ old('nombre') }}">
                                @error('nombre')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control"
                                    value="{{ old('descripcion') }}">
                                @error('descripcion')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="archivo">Archivo</label>
                                <input type="file" name="archivo" id="archivo" class="form-control"
                                    value="{{ old('archivo') }}">
                                @error('archivo')
                                    <small class="text-danger">Campo Requerido</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="personal_id">Personal</label>
                                <select name="personal_id" id="personal_id" class="form-control">
                                    <option value="">Seleccione un pesonal</option>
                                    @foreach ($personals as $personal)
                                        <option value="{{ $personal->id }}"
                                            {{ old('personal_id') == $personal->id ? 'selected' : '' }}>
                                            {{ $personal->nombre }}</option>
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
