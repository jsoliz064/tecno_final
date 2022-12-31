<form method="post" action="{{ route('archivo.update',$archivo) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h5>nombre</h5>
    <input type="text" name="nombre" value="{{$archivo->nombre}}">
    @error('nombre')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <h5>descripcion</h5>
    <input type="text" name="descripcion" value="{{$archivo->descripcion}}">
    @error('descripcion')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <h5>fecha</h5>
    <input type="date" name="fecha" value="{{$archivo->fecha}}">
    @error('fecha')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <h5>personal:</h5>
    <select name="personal_id">
        <option value="{{$archivo->personal_id}}">{{$archivo->Personal->nombre}}</option>
        @foreach ($personals as $personal)
            <option value="{{ $personal->id }}">{{ $personal->nombre }}</option>
        @endforeach
    </select>
    @error('personal_id')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    @if ($archivo->ruta)
        <h5>Archivo:</h5>
        <a href="{{asset($archivo->ruta)}}">abrir archivo</a>
    @endif

    <h5>Cambiar Archivo</h5>
    <input type="file" name="archivo">
    @error('archivo')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <button type="submit" class="btn btn-primary mt-2">actualizar archivo</button>

</form>
