@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Delete Loan</h2>
                </div>
                <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">User:</label>
                    <input class="form-control" name="user" value="{{ $review->user->name }}" readonly />
                </div>
                <div class="mb-3">
                    <label class="form-label">Book:</label>
                    <input class="form-control" name="book" value="{{ $review->book->title }}" readonly />
                </div>
                <div class="mb-3">
                    <label class="form-label">Rating:</label>
                    <input class="form-control" name="rating" value="{{ $review->rating}}" readonly />
                </div>
                <div class="mb-3">
                    <label class="form-label">Comment:</label>
                    <textarea class="form-control" rows="8" name="comment" readonly>{{ $review->comment }}</textarea>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="{{ route('review.destroy', ['review' => $review->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this review?')" class="btn btn-outline-danger float-end">
                                <i class="bi bi-trash-fill"></i> Confirm 
                            </button>
                        </form>
                            <a class="btn btn-outline-secondary" href="{{ route('review.index', ['controller' => 'ReviewController', 'action' => 'index']) }}">
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