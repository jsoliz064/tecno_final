@extends('plantilla.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-center">Asistencia {{$hoy}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive my-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>CI</th>
                                        <th>Hora Ingreso</th>
                                        <th>Hora Salida</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personal as $person)
                                        <tr>
                                            <td>{{ $person->nombre }} {{ $person->apellido }}</td>
                                            <td>{{ $person->ci }}</td>
                                            <td id="{{$person->id."ingreso"}}"></td>
                                            <td id="{{$person->id."salida"}}"></td>
                                            <td id="{{$person->id."btn"}}">
                                                <button onclick="marcar('{{$person->id}}')" class="btn btn-warning">Marcar</button>
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
    <script>
        function marcar(id){
            const tdingreso=document.getElementById(id+'ingreso');
            const tdsalida=document.getElementById(id+'salida');
            const tdbtn=document.getElementById(id+'btn');

            if (tdingreso.innerHTML.length==0){
                tdingreso.innerHTML="20:00";
            }else if (tdsalida.innerHTML.length==0){
                tdsalida.innerHTML="20:00";
            }else{
                tdbtn.style.display="none";
            }

            console.log(id)
        }
    </script>
@endsection
