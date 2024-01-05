@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Create Book</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('book.store', ['controller' => 'BookController']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title:</label>
                            <input class="form-control" required placeholder="Enter a title..." name="title" />
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image:</label>
                            <input type="file" class="form-control" name="image" accept="image/*" />
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Author:</label>
                            <select class="form-select" required name="author_id">
                                <option value="">Select an author</option>
                                @foreach($book as $books)
                                    <option value="{{ $books->author->id }}">{{ $books->author->name}}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category:</label>
                            <select class="form-select" required name="category_id">
                                <option value="">Select an category</option>
                                @foreach($book as $books)
                                    <option value="{{ $books->category->id }}">{{ $books->category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <input class="form-control" required placeholder="Enter a description..." name="description" />
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISBN:</label>
                            <input class="form-control" required placeholder="Enter a ISBN..." name="ISBN" />
                            @error('ISBN')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Copies:</label>
                            <input class="form-control" required placeholder="Enter a total copies..." name="total_copies" />
                            @error('total_copies')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Available Copies:</label>
                            <input class="form-control" required placeholder="Enter a available copies..." name="available_copies" />
                            @error('available_copies')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-plus-circle"></i> Add
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('book.index', ['controller' => 'BookController', 'action' => 'index']) }}">
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
