@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Update Author</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('author.update', ['author' => $author->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input class="form-control" required placeholder="Enter a name..." name="name" value="{{ $author->name }}"/>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biography:</label>
                            <textarea class="form-control" required placeholder="Enter a biography..." rows="8" name="biography">{{ $author->biography }}</textarea>
                            @error('biography')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-pencil-fill"></i> Update
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('author.index', ['controller' => 'AuthorController', 'action' => 'index']) }}">
                                    <i class="bi bi-eye"></i> 
                                    <span>Show all</span>
                                </a>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

