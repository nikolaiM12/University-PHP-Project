@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Delete Book</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <img src="{{ asset($book->image) }}" alt="Book Image" class="img-thumbnail" style="max-width: 300px;" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title:</label>
                        <input class="form-control" name="name" value="{{ $book->title }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author:</label>
                        <input class="form-control" name="author" value="{{ $book->author->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category:</label>
                        <input class="form-control" name="category" value="{{ $book->category->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea class="form-control" rows="4" name="description" readonly>{{ $book->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ISBN:</label>
                        <input class="form-control" name="ISBN" value="{{ $book->ISBN }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total Copies:</label>
                        <input class="form-control" name="total_copies" value="{{ $book->total_copies }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Available Copies:</label>
                        <input class="form-control" name="available_copies" value="{{ $book->available_copies }}" readonly />
                    </div>
                    <div class="mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')" class="btn btn-outline-danger float-end">
                                    <i class="bi bi-trash-fill"></i> Confirm 
                                </button>
                            </form>
                                <a class="btn btn-outline-secondary" href="{{ route('book.index', ['controller' => 'BookController', 'action' => 'index']) }}">
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
