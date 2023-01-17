@extends('plantilla.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create Role
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="permissions">Permissions</label>
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}">
                                        @error('permissions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <label class="form-check-label" for="{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
