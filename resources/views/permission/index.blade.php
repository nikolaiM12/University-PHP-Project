@extends('layouts.admin')

@section('title')
Permissions
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
        <h3 class="card-title">Permission Table</h3>
        <div class="card-tools">
            <a href="{{ route('permission.create', ['controller' => 'PermissionController', 'action' => 'create']) }}" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-plus-circle mr-1"></i>
                <span>Create new permission</span>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Date Posted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permission as $permissions)
                    <tr class="text-center">
                        <td>{{ $permissions->name }}</td>
                        <td>{{ $permissions->created_at }}</td>
                        <td>
                            <a href="{{ route('permission.edit', ['permission' => $permissions->id]) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-fill square"></i> <span style="color: black;">Edit Permission</span>
                            </a>
                            <a class="btn btn-danger">
                                <form action="{{ route('permission.destroy', ['permission' => $permissions->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete permission?');">
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
                            <i class="bi bi-folder2-open"><i>
                            <span>No Result Found</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection