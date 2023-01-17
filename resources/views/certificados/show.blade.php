@extends('plantilla.app')

@section('content_header')
    <a class="btn btn-dark" href="{{ route('certificados.index') }}">Volver</a>
    <a class="btn btn-primary float-right" href="{{ route('certificados.download',$certificado) }}">Descargar Certificado</a>
    
    <hr>
    <br>
    <br>
@stop

@section('content')
    @if ($certificado)
        @include('certificado')
    @else
        <h1 class="d-flex justify-content-center">CERTIFICADO NO VALIDO</h1>
    @endif
@endsection
