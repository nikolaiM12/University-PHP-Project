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
                        <label class="form-label">Title:</label>
                        <input class="form-control" name="name" value="{{ $book->title }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <img src="{{ asset($book->image) }}" alt="Book Image" class="img-thumbnail" style="max-width: 300px;" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author:</label>
                        <input class="form-control" value="{{ $book->author->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category:</label>
                        <input class="form-control" value="{{ $book->category->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea class="form-control" rows="8" name="description" readonly>{{ $book->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ISBN:</label>
                        <input class="form-control" value="{{ $book->ISBN }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total Copies:</label>
                        <input class="form-control" value="{{ $book->total_copies }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Available Copies:</label>
                        <input class="form-control" value="{{ $book->available_copies }}" readonly />
                    </div>
                    <div class="mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-outline-success float-end" href="{{ route('book.edit', ['book' => $book->id]) }}">
                                <i class="bi bi-pencil-fill square"></i> 
                                <span>Update</span>
                            </a>
                            <a class="btn btn-outline-secondary" href="{{ route('book.index') }}">
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
