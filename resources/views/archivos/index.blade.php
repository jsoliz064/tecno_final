@extends('plantilla.app')

@section('title', 'Archivos')

@section('content_header')
    <h1>Archivos</h1>
@stop

@section('content')
    @foreach ($archivos as $archivo)
        <p>{{ $archivo->id }} {{ $archivo->nombre }} {{ $archivo->descripcion }} {{ $archivo->ruta }} {{ $archivo->fecha }}
            {{ $archivo->personal_id }}</p>
        <a href="{{ route('archivo.edit', $archivo) }}">Editar Archivo</a>
    @endforeach
    <br>
    <a href="{{ route('archivo.create') }}">Crear archivo</a>
@endsection

@section('css')

@stop

@section('js')
            
@stop
