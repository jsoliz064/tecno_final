<form method="post" action="{{ route('archivo.store') }}" enctype="multipart/form-data">
    @csrf
    <h5>nombre</h5>
    <input type="text" name="nombre">
    @error('nombre')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <h5>descripcion</h5>
    <input type="text" name="descripcion">
    @error('descripcion')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <h5>fecha</h5>
    <input type="date" name="fecha">
    @error('fecha')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <h5>personal:</h5>
    <select name="personal_id">
        <option value="">Seleccione una categoria</option>
        @foreach ($personals as $personal)
            <option value="{{ $personal->id }}">{{ $personal->nombre }}</option>
        @endforeach
    </select>
    @error('personal_id')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <h5>Archivo</h5>
    <input type="file" name="archivo">
    @error('archivo')
        <small class="text-danger">Campo Requerido</small>
    @enderror

    <button type="submit" class="btn btn-primary mt-2">Crear archivo</button>

</form>
