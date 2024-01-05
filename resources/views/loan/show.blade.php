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
                        <label class="form-label">User:</label>
                        <input class="form-control" value="{{ $loan->user->name }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Book:</label>
                        <input class="form-control" value="{{ $loan->book->title }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Due date:</label>
                        <input class="form-control" value="{{ $loan->due_date }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Returned at:</label>
                        <input class="form-control" value="{{ $loan->returned_at }}" readonly />
                    </div>
                    <div class="mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-outline-success float-end" href="{{ route('loan.edit', ['loan' => $loan->id]) }}">
                                <i class="bi bi-pencil-fill square"></i> 
                                <span>Update</span>
                            </a>
                            <a class="btn btn-outline-secondary" href="{{ route('loan.index') }}">
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