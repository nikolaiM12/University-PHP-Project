@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Create Notification</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('notification.store', ['controller' => 'NotificationController']) }}" method="post">
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
                            <label class="form-label">Message:</label>
                            <textarea class="form-control" required placeholder="Enter a message..." rows="8" name="message"></textarea>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Read at:</label>
                            <input class="form-control" required placeholder="Enter a date and time..." name="read_at" />
                            @error('read_at')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-plus-circle"></i> Add
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('notification.index', ['controller' => 'NotificationController', 'action' => 'index']) }}">
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