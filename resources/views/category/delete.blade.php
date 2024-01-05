@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Delete Category</h2>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
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
                            <form action="{{ route('category.destroy', ['category' => $category -> id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-outline-danger float-end">
                                    <i class="bi bi-trash-fill"></i> Confirm 
                                </button>
                            </form>
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
