@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Create Review</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('review.store', ['controller' => 'ReviewController']) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">User:</label>
                            <select class="form-select" required name = "user_id">
                                <option value="">Select a user</option>
                                @foreach($user as $users)
                                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book:</label>
                            <select class="form-select" required name = "book_id">
                                <option value="">Select a book</option>
                                @foreach($book as $books)
                                    <option value="{{ $books->id }}">{{ $books->title }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating:</label>
                            <input class="form-control" required placeholder="Enter a rating..." name="rating" />
                            @error('rating')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment:</label>
                            <textarea class="form-control" required placeholder="Enter a comment..." rows="8" name="comment"></textarea>
                            @error('comment')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-plus-circle"></i> Add
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('review.index', ['controller' => 'ReviewController', 'action' => 'index']) }}">
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