@extends('layouts.admin')

@section('pageName')
Edit Role
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Role</h3>
        <div class="card-tools">
            <a href="{{ route('role.index') }}" class="btn btn-danger">
                <i class="bi bi-shield-shaded"></i>
                <span>See all Roles</span>
            </a>
        </div>
    </div>
    <div class="card-main">
        <div class="card-body">
            <form action="{{ route('role.update', ['role' => $role->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" name="name" id="name" placeholder="Role Name" class="form-control" value="{{ $role->name }}">
                </div>
                <div class="form-group">
                    <label for="permissions">Assign Permissions</label>
                    @foreach($permission as $permissions)
                        <div class="form-check">
                            <input type="checkbox" name="permissions[]" value="{{ $permissions->id }}" class="form-check-input" {{ $role->permissions->contains($permissions->id) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $permissions->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                       <i class="bi bi-save"></i>
                       <span>Update Role</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
