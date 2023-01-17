@extends('plantilla.app')

@section('title', 'Archivos')

@section('content_header')
    <h1>Archivos</h1>
@stop

@section('content')
    @can('archivos.create')
        <a href="{{ route('archivos.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Archivo</a>
    @endcan
    <div class="card">
        <div class="card-body">
            <div class="table-responsive my-3">
                <table class="table table-striped" id="usuarios">

                    <thead>

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Registrado</th>
                            <th scope="col">Link</th>
                            <th scope="col">Personal</th>
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
                                <td>{{ $archivo->Personal->nombre }}</td>

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
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        });
    </script>
@stop
