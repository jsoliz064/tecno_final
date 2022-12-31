@foreach ($archivos as $archivo)
    <p>{{$archivo->id}} {{$archivo->nombre}} {{$archivo->descripcion}} {{$archivo->ruta}} {{$archivo->fecha}} {{$archivo->personal_id}}</p>
    <a href="{{route('archivo.edit',$archivo)}}">Editar Archivo</a>
@endforeach
<br>
<a href="{{route('archivo.create')}}">Crear archivo</a>