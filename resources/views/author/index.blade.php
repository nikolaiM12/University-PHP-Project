@extends('layouts.admin')

@section('title')
Author
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
            <a class="btn btn-outline-primary" href="{{ route('author.create', ['controller' => 'AuthorController', 'action' => 'create']) }}">
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
            <th>Biography</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($author as $authors)
        <tr class="text-center">
            <td>{{ $authors->name }}</td>
            <td>{{ $authors->biography }}</td>
            <td>
                <div class="w-100 btn-group" role="group">
                    <a class="btn btn-outline-primary" href="{{ route('author.edit', ['author' => $authors->id]) }}">
                        <i class="bi bi-pencil-fill square"></i> 
                        <span>Update</span>
                    </a>
                    <a class="btn btn-outline-info" href="{{ route('author.show', ['author' => $authors->id]) }}">
                        <i class="bi bi-eye"></i> 
                        <span>Details</span>
                    </a>  
                    <a class="btn btn-outline-danger" href="{{ route('author.delete', ['author' => $authors->id]) }}">
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

        
