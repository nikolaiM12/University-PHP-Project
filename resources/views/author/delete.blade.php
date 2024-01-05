@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Delete Author</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input class="form-control" name="name" value="{{ $author->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biography:</label>
                        <textarea class="form-control" rows="8" name="biography" readonly>{{ $author->biography }}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form action="{{ route('author.destroy', ['author' => $author->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <i class="bi bi-trash-fill" style="color: white;"></i> 
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this author?')" class="btn btn-outline-danger float-end">
                                    <i class="bi bi-trash-fill"></i> Confirm 
                                </button>
                            </form>
                                <a class="btn btn-outline-secondary" href="{{ route('author.index', ['controller' => 'AuthorController', 'action' => 'index']) }}">
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

