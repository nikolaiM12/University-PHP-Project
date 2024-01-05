@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input class="form-control" name="name" value="{{ $category ->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea class="form-control" rows="4" name="description" readonly>{{ $category -> description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-outline-success float-end" href="{{ route('category.edit', ['category' => $category->id]) }}">
                                <i class="bi bi-pencil-fill square"></i> 
                                <span>Update</span>
                            </a>
                            <a class="btn btn-outline-secondary" href="{{ route('category.index', ['controller' => 'CategoryController', 'action' => 'index']) }}">
                                <i class="bi bi-eye"></i> 
                                <span>Show all</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
