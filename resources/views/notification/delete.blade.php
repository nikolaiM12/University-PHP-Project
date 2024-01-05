@extends('layouts.admin')

@section('content')
<div class="container m-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Delete Notification</h2>
                </div>
                <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">User:</label>
                    <input class="form-control" name="user" value="{{ $notification->user->name }}" readonly />
                </div>
                <div class="mb-3">
                    <label class="form-label">Message:</label>
                    <textarea class="form-control" rows="8" name="message" readonly>{{ $notification->message }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Read at:</label>
                    <input class="form-control" name="read_at" value="{{ $notification->read_at}}" readonly />
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="{{ route('notification.destroy', ['notification' => $notification->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this notification?')" class="btn btn-outline-danger float-end">
                                <i class="bi bi-trash-fill"></i> Confirm 
                            </button>
                        </form>
                            <a class="btn btn-outline-secondary" href="{{ route('notification.index', ['controller' => 'NotificationController', 'action' => 'index']) }}">
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