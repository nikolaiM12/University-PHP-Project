@extends('layouts.admin')

@section('title')
Category
@endsection

@section('content')
<div class="card-body p-4">
    <div class="row pb-3">
        <div class="col-6">
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
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-outline-primary" href="{{ route('category.create', ['controller' => 'CategoryController', 'action' => 'create']) }}">
                <i class="bi bi-plus-circle"></i> 
                <span>Create</span>
            </a>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $categories)
        <tr class="text-center">
            <td>{{ $categories->name }}</td>
            <td>{{ $categories->description }}</td>
            <td>
                <div class="w-100 btn-group" role="group">
                    <a class="btn btn-outline-primary" href="{{ route('category.edit', ['category' => $categories->id]) }}">
                        <i class="bi bi-pencil-fill square"></i> 
                        <span>Update</span>
                    </a>
                    <a class="btn btn-outline-info" href="{{ route('category.show', ['category' => $categories->id]) }}">
                        <i class="bi bi-eye"></i> 
                        <span>Details</span>
                    </a>  
                    <a class="btn btn-outline-danger" href="{{ route('category.delete', ['category' => $categories->id]) }}">
                        <i class="bi bi-trash-fill"></i> 
                        <span>Delete</span>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
