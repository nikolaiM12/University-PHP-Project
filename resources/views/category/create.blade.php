@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Create Category</h2>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store', ['controller' => 'CategoryController']) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input class="form-control" required placeholder="Enter a name..." name="name" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <textarea class="form-control" required placeholder="Enter a description..." rows="8" name="description"></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-plus-circle"></i> Add
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('category.index', ['controller' => 'CategoryController', 'action' => 'index']) }}">
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
