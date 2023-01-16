@extends('plantilla.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-center">Personal</h3>
                        @can('personal.create')
                            <a href="{{ route('personal.create') }}" class="btn btn-primary float-right">Registrar Personal</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive my-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personal as $person)
                                        <tr>
                                            <td>{{ $person->nombre }} {{ $person->apellido }}</td>
                                            <td>{{ $person->correo }}</td>
                                            <td>{{ $person->telefono }}</td>
                                            <td>{{ $person->direccion }}</td>
                                            <td>{{ $person->TipoPersonal->nombre }}</td>
                                            <td>
                                                <a href="{{ route('personal.edit', $person->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('personal.destroy', $person->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                                        value="Borrar">Delete</button>
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
