@extends('layouts.admin')

@section('title')
Password
@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
            <div>
                <div>
                    <form class="form-horizontal" method="POST" action="{{ route('userPostPassword') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="newpassword">Enter New Password</label>
                                    <input type="password" name="newpassword"  id="newpassword" class="form-control @error('newpassword') is-invalid @enderror" value="" required placeholder="New Password">
                                    @error('newpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="newpassword_confirmation">Confirm New Password</label>
                                    <input type="password" name="newpassword_confirmation"  id="newpassword_confirmation" class="form-control @error('newpassword_confirmation') is-invalid @enderror" value="" required placeholder="Confirm Password">
                                    @error('newpassword_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                                        </svg>
                                        Change Password
                                    </button>
                                    {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection