@extends('layouts.admin')

@section('title')
Loan
@endsection

@section('content')
<div class="card-body p-4">
    <div class="row pb-3">
        <div class="col-6">
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
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-outline-primary" href="{{ route('loan.create', ['controller' => 'LoanController', 'action' => 'create']) }}">
                <i class="bi bi-plus-circle"></i> 
                <span>Create</span>
            </a>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr class="text-center">
            <th>User</th>
            <th>Book</th>
            <th>Due date</th>
            <th>Returned at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($loan as $loans)
        <tr class="text-center">
            <td>{{ $loans->user->name }}</td>
            <td>{{ $loans->book->title }}</td>
            <td>{{ $loans->due_date }}</td>
            <td>{{ $loans->returned_at }}</td>
            <td>
                <div class="w-100 btn-group" role="group">
                    <a class="btn btn-outline-primary" href="{{ route('loan.edit', ['loan' => $loans->id]) }}">
                        <i class="bi bi-pencil-fill square"></i> 
                        <span>Update</span>
                    </a>
                    <a class="btn btn-outline-info" href="{{ route('loan.show', ['loan' => $loans->id]) }}">
                        <i class="bi bi-eye"></i> 
                        <span>Details</span>
                    </a>  
                    <a class="btn btn-outline-danger" href="{{ route('loan.delete', ['loan' => $loans->id]) }}">
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
