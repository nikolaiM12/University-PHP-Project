@extends('layouts.admin')
@section('title')
Roles
@endsection

@section('content')
<div class="card">
    <div class="card-header">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif
        <h3 class="card-title">Roles Table</h3>
        <div class="card-tools">
            <a href="{{ route('role.create') }} " class="btn btn-primary">
                <i class="bi bi-shield-shaded"></i>
                <span>Add new Role</span>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr class="text-center">
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Date Posted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($role as $roles )
                    <tr class="text-center">
                        <td>{{ $roles->name }}</td>
                        <td>
                            @foreach ($roles->permissions as $permission)
                                <button class="btn btn-primary" role="button">
                                    <i class="bi bi-shield-shaded" style="color: white;"></i>
                                    <span style="color: white;">{{ $permission->name }}</span>
                                </button>
                            @endforeach
                        </td>
                        <td><span class="tag tag-success">{{ $roles->created_at }}</span></td>
                        <td>
                            <a href="{{ route('role.edit', ['role' => $roles->id]) }}" class="btn btn-info" style="color: white;">
                                <i class="bi bi-pencil-fill square" style="color: white;"></i> 
                                <span style="color: white;">Change Permission</span>
                            </a>
                            <a class="btn btn-danger">
                                <form action="{{ route('role.destroy', ['role' => $roles->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete role?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding: 0; border: none; background: none;">
                                        <i class="bi bi-trash-fill" style="color:white;"></i> 
                                        <span style="color: white;">Delete</span>
                                    </button>
                                </form>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            <i class="bi bi-folder2-open"></i>
                            <span>No Record found</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection