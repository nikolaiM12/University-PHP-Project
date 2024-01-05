@extends('layouts.admin')
@section('pageName')
Create Roles
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new Role</h3>
        <div class="card-tools">
            <a href="{{ route('role.index') }}" class="btn btn-danger">
                <i class="bi bi-shield-shaded"></i>
                <span>See all Roles</span>
            </a>
        </div>
    </div>
    <div class="card-main">
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" name="name" id="name" placeholder="Role Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="permissions">Assign Permissions</label>
                    @if($permission)
                        @foreach($permission as $permissions)
                            <div class="form-check">
                                <input type="checkbox" name="permissions[]" value="{{ $permissions->id }}" class="form-check-input">
                                <label class="form-check-label">{{ $permissions->name }}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-tools">
                    <button type="submit" class="btn btn-primary">
                       <i class="bi bi-save"></i>
                       <span>Save Role</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


