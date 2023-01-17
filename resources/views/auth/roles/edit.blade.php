@extends('plantilla.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Role
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $role->name }}">
                            </div>
                            <div class="form-group">
                                <label for="permissions">Permissions</label>
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            id="{{ $permission->id }}" value="{{ $permission->id }}"
                                            @if ($role->permissions->contains($permission->id)) checked @endif>
                                        <label class="form-check-label" for="{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
