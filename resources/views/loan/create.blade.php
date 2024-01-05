@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Create Loan</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('loan.store', ['controller' => 'LoanController']) }}" method="post">
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
                            <select class="form-select" required name="book_id">
                                <option value="">Select a book</option>
                                @foreach($book as $books)
                                    <option value="{{ $books->author->id }}">{{ $books->author->name}}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Due date:</label>
                            <input class="form-control" required placeholder="Enter a due date..." name="due_date" />
                            @error('due_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Returned at:</label>
                            <input class="form-control" required placeholder="Date returned..." name="returned_at" />
                            @error('returned_at')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-plus-circle"></i> Add
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('loan.index', ['controller' => 'LoanController', 'action' => 'index']) }}">
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