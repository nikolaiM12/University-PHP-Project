@extends('layouts.admin')

@section('title')
Book
@endsection

@section('content')
<div class="card-body p-4">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
    @endif
    <div class="row pb-3">
        <div class="col-6">
            <form action="{{ route('book.search') }}" method="GET">
                <div class="input-group rounded">
                    <input type="text" class="form-control form-control-sm rounded-sm" name="query" placeholder="Search for books..." aria-describedby="search-addon" />
                    <a class="input-group-text border-0" id="search-addon" href="{{ route('book.search') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewbox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                    </a>
                </div>
            </form>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-outline-primary" href="{{ route('book.create', ['controller' => 'BookController', 'action' => 'create']) }}">
                <i class="bi bi-plus-circle"></i> 
                <span>Create</span>
            </a>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr class="text-center">
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Description</th>
            <th>ISBN</th>
            <th>Total Copies</th>
            <th>Available Copies</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($book as $books)
        <tr class="text-center">
            <td><img src="{{ $books->image }}" alt="Book Image" style="width: 100px; height: auto;"></td>
            <td>{{ $books->title }}</td>
            <td>{{ $books->author->name }}</td>
            <td>{{ $books->category->name}}</td>
            <td>{{ $books->description }}</td>
            <td>{{ $books->ISBN }}</td>
            <td>{{ $books->total_copies }}</td>
            <td>{{ $books->available_copies }}</td>
            <td>
                <div class="w-100 btn-group" role="group">
                    <a class="btn btn-outline-primary" href="{{ route('book.edit', ['book' => $books->id]) }}">
                        <i class="bi bi-pencil-fill square"></i> 
                        <span>Update</span>
                    </a>
                    <a class="btn btn-outline-info" href="{{ route('book.show', ['book' => $books->id]) }}">
                        <i class="bi bi-eye"></i> 
                        <span>Details</span>
                    </a>  
                    <a class="btn btn-outline-danger" href="{{ route('book.delete', ['book' => $books->id]) }}">
                        <i class="bi bi-trash-fill"></i> 
                        <span>Delete</span>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
