@extends('layouts.admin')

@section('title')
Create Permission
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new Permission</h3>
        <div class="card-tools">
            <a href="{{ route('permission.index') }}" class="btn btn-danger">
                <i class="bi bi-shield-shaded"></i>
                <span class="ml-1">See all Permission</span>
            </a>
        </div>
    </div>
    <form method="POST" action="{{ route('permission.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Permission Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-shield-shaded"></i>
                <span class="ml-1">Create Permission</span>
            </button>
        </div>
    </form>
</div>
@endsection