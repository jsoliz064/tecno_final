@extends('plantilla.app')

@section('content_header')
    <a class="btn btn-dark my-2" href="{{ route('personal.index') }}">Volver</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-center"><b>Detalle del Personal</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row py-2 px-2">
                            <div class="col-md-3">
                                <h5><b>Tipo de Personal:</b></h5>
                            </div>

                            <div class="col-md-9">
                                <h5>{{ $personal->TipoPersonal->nombre }}</h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Nombre: </b></h5>
                            </div>

                            <div class="col-md-9">
                                <h5>{{ $personal->nombre }} {{ $personal->apellido }}</h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Carnet de Identidad: </b></h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $personal->ci }}</h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Genero: </b></h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $personal->genero }}</h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Fecha de Nacimiento: </b></h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $personal->fecha_nacimiento }} </h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Correo: </b></h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $personal->correo }}</h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Telefono: </b></h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $personal->telefono }}</h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Dirección: </b></h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $personal->direccion }}</h5>
                            </div>

                            <div class="col-md-3">
                                <h5><b>Estado Civil: </b></h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $personal->estado_civil }}</h5>
                            </div>

                            <div class="col-md d-flex justify-content-center">
                                <a href="{{route('personal.edit',$personal)}}" class="btn btn-primary">Editar</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-center"><b>Horario Actual</b></h4>
                    </div>
                    <div class="card-body">
                        @if ($personal->horario_id)
                            <div class="row">
                                <div class="col-md-3">
                                    <h5><b>Hora de Ingreso:</b></h5>
                                </div>
                                <div class="col-md-9">
                                    <h5>{{ $horario->hora_ingreso }}</h5>
                                </div>

                                <div class="col-md-3">
                                    <h5><b>Hora de Salida:</b></h5>
                                </div>
                                <div class="col-md-9">
                                    <h5>{{ $horario->hora_salida }}</h5>
                                </div>

                                <div class="col-md-3">
                                    <h5><b>Cantidad de Horas Mensuales:</b></h5>
                                </div>
                                <div class="col-md-9">
                                    <h5>{{ $horario->horas_mensuales }}</h5>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-center"><b>Archivos</b></h4>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-striped" id="usuarios">
            
                                <thead>
            
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Registrado</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
            
                                <tbody>
                                    @foreach ($archivos as $archivo)
                                        <tr>
                                            <td>{{ $archivo->id }}</td>
                                            <td>{{ $archivo->nombre }}</td>
                                            <td>{{ $archivo->descripcion }}</td>
                                            <td>{{ $archivo->updated_at }}</td>
                                            <td><a href="{{ asset($archivo->link) }}">Ver archivo</a></td>
            
                                            <td class="d-flex justify-content-center">
                                                @can('archivos.edit')
                                                    <a href="{{ route('archivos.edit', $archivo) }}"
                                                        class="btn btn-info btn-sm mx-1">Editar</a>
                                                @endcan
                                                @can('archivos.destroy')
                                                    <form action="{{ route('archivos.destroy', $archivo) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm mx-1"
                                                            onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                                            value="Borrar">Eliminar</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
            
                                </tbody>
            
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-center">Certificados</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive my-3">
                            <table class="table table-striped" id="usuarios">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificados as $certificado)
                                        <tr>
                                            <td>{{ $certificado->codigo }}</td>
                                            <td>{{ $certificado->fecha_inicio }}</td>
                                            <td>{{ $certificado->fecha_fin }}</td>
                                            <td>
                                                @can('certificados.show')
                                                    <a href="{{ route('certificados.show', $certificado->id) }}"
                                                        class="btn btn-warning">Ver</a>
                                                @endcan
                                                <form action="{{ route('certificados.destroy', $certificado->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                                        value="Borrar">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
