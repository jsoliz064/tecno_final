@extends('plantilla.app')

@section('title', 'Horarios')

@section('content_header')
    <h1>Horarios</h1>
@stop

@section('content')
    @can('horarios.create')
        <a href="{{ route('horarios.create') }}"class="btn btn-primary btb-sm my-4"> Registrar Horario</a>
    @endcan
    <div class="card">
        <div class="card-body">
            <div class="table-responsive my-3">
                <table class="table table-striped" id="usuarios">

                    <thead>

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Hora Ingreso</th>
                            <th scope="col">Hora Salida</th>
                            <th scope="col">Horas Mensuales</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($horarios as $horario)
                            <tr>
                                <td>{{ $horario->id }}</td>
                                <td>{{ $horario->hora_ingreso }}</td>
                                <td>{{ $horario->hora_salida }}</td>
                                <td>{{ $horario->horas_mensuales }}</td>

                                <td class="d-flex justify-content-center">
                                    @can('horarios.edit')
                                        <a href="{{ route('horarios.edit', $horario) }}"
                                            class="btn btn-info btn-sm mx-1">Editar</a>
                                    @endcan
                                    @can('horarios.destroy')
                                        <form action="{{ route('horarios.destroy', $horario) }}" method="post">
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
