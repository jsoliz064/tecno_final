@extends('plantilla.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-center">Asistencia {{ $hoy }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive my-3">
                            <table class="table table-striped" id="usuarios">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>CI</th>
                                        <th>Hora Ingreso</th>
                                        <th>Hora Salida</th>
                                        <th>Retraso</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personal as $person)
                                        @php
                                            $asistencia = $person->Asistencia();
                                            $hora_ingreso="";
                                            $hora_salida="";
                                            $retraso="";

                                            if ($asistencia){
                                                $hora_ingreso=$asistencia->hora_ingreso;
                                                $hora_salida=$asistencia->hora_salida?$asistencia->hora_salida:"";
                                                $retraso=$asistencia->retraso." min";
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ $person->nombre }} {{ $person->apellido }}</td>
                                            <td>{{ $person->ci }}</td>
                                            <td id="{{ $person->id . 'ingreso' }}">{{$hora_ingreso}}</td>
                                            <td id="{{ $person->id . 'salida' }}">{{$hora_salida}}</td>
                                            <td id="{{ $person->id . 'retraso' }}">{{$retraso}}</td>
                                            <td>
                                                @if (!$hora_ingreso || !$hora_salida)
                                                        <button id="{{ $person->id . 'btn' }}"
                                                            onclick="marcar('{{ $person->id }}')"
                                                            class="btn btn-warning">Marcar</button>
                                                @endif
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
        @php $url=env('APP_URL'); @endphp
    </div>
    <script>
        const url=$url;
        async function marcar(id) {
            fetch(url+'/asistencias/marcar/' + id, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(resultado => imprimir(id, resultado))
                .catch(error => console.error(error))
        }

        function imprimir(id, asistencia) {
            console.log(id, asistencia)
            const tdingreso = document.getElementById(id + 'ingreso');
            const tdsalida = document.getElementById(id + 'salida');
            const tdretraso = document.getElementById(id + 'retraso');
            const tdbtn = document.getElementById(id + 'btn');

            if (tdingreso.innerHTML.length == 0) {
                tdingreso.innerHTML = asistencia.hora_ingreso;
                tdretraso.innerHTML = asistencia.retraso + " min";
            } else if (tdsalida.innerHTML.length == 0) {
                tdsalida.innerHTML = asistencia.hora_salida;
                tdbtn.style.display = "none";
            }
        }
    </script>
@endsection

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
