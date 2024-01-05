<!-- book/details.blade.php -->
@extends('layouts.public')
@section('content')
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($books as $book)
        <div class="col mb-4">
            <div class="card">
                <div class="card card-primary card-outline">
                    <img src="{{ asset($book->image) }}" class="card-img-top" alt="Book Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <div class="book-details">
                            <div class="book-info">
                                <strong>Author:</strong> {{ $book->author->name }}
                            </div>
                            <div class="book-info">
                                <strong>Category:</strong> {{ $book->category->name }}
                            </div>
                            <div class="book-info">
                                <strong>Available Copies:</strong> {{ $book->available_copies }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
</div>



