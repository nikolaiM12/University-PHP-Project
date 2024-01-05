@extends('layouts.admin')

@section('title')
User
@endsection

@section('content')
<div class="p-0">
    <div class="card">
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
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="bi bi-people-fill"></i>
                <span>Users</span>
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item mr-1">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createUserModal">
                            <i class="bi bi-plus-circle"></i>
                            <span>Add New</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('user.search') }}" method="GET">
                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                <input type="text" name="query" class="form-control float-right" placeholder="Search by name, email" aria-describedby="search-addon">
                                <a class="input-group-text border-0" id="search-addon" style="cursor: pointer;" href="{{ route('user.search') }}">
                                    <i class="bi bi-search"></i>
                                </a>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Actions</th>
                        <th>Date Posted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $users)
                        <tr class="text-center">
                            <td>
                                {{ $users->name }}
                            </td>
                            <td>
                                @if(!empty($users->getRoleNames()))
                                    @foreach($users->getRoleNames() as $v)
                                        <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $users->email }}
                            </td>
                            <td>
                                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#viewUserModal{{ $users->id }}" style="color: white;">
                                    <i class="bi bi-eye"></i>
                                    <span class="mr-1">View</span>
                                </a>
                                <a class="btn btn-warning" href="{{ route('user.profile') }}" style="color:white;">
                                    <i class="bi bi-pencil-fill square"></i>
                                    <span>Edit</span>
                                </a>
                                <a class="btn btn-danger">
                                    <form action="{{ route('user.destroy', [$users->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding: 0; border: none; background: none;">
                                            <i class="bi bi-trash-fill" style="color: white;"></i>
                                            <span style="color:white;">Delete</span>
                                        </button>
                                    </form>
                                </a>
                            </td>
                            <td>
                                {{ $users->created_at->format('Y-m-d H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@foreach($user as $users)
<div class="modal fade" id="viewUserModal{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel{{ $users->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <p><b>Name:</b> {{ $users->name }}</p>
                            <p><b>Email:</b> {{ $users->email }}</p>
                            <p><b>Last Posted:</b> {{ $users->created_at->format('Y-m-d, H:i:s') }}</p>
                            <p><b>Date Posted:</b> {{ $users->created_at->format('Y-m-d, H:i:s') }}</p>
                        </div>
                        <div class="col-md-6">
                            <img style="width: 80%;" class="img-circle" src="{{ asset('img/profile.jpg') }}" alt="{{ auth()->user()->name . ' Photo' }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach 
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.store', ['controller' => 'UserController']) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="role">Choose Role</label>
                        <select name="role" id="role" class="form-control">
                             @foreach ($role as $roles)
                                <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="permissions">Assign Permissions</label>
                        @if($permission)
                            @foreach($permission as $permissions)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permissions->id }}" class="form-check-input">
                                    <label class="form-check-label">{{ $permissions->name }}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-lg btn-primary">Save User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




