@extends('plantilla.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-center">Certificados</h3>
                        @can('certificados.create')
                            <a href="{{ route('certificados.create') }}" class="btn btn-primary float-right">Emitir
                                Certificado</a>
                        @endcan
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
                                        <th>Personal</th>
                                        <th>Codigo</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($certificados as $certificado)
                                        <tr>
                                            <td>{{ $certificado->Personal->nombre }} {{ $certificado->Personal->apellido }}
                                            </td>
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
