@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Update Notification</h2>
                </div>
                <div class="card-body">
                <form action="{{ route('notification.update', ['notification' => $notification->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">User:</label>
                        <select class="form-select" required name="user_id">
                            <option value="">Select a user</option>
                                @foreach($user as $users)
                                    <option value="{{ $users->id }}" @if($notification->user_id == $users->id) selected @endif>{{ $users->name }}</option>
                                @endforeach
                        </select>
                        @error('user_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message:</label>
                        <input class="form-control" required placeholder="Enter a message..." name="message" value="{{ $notification->message }}" />
                        @error('message')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Read at:</label>
                        <input class="form-control" required placeholder="Enter a date and time..." name="read_at" value="{{ $notification->read_at }}" />
                        @error('read_at')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="bi bi-pencil-fill"></i> Update
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
@endsection