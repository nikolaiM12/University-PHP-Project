<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Library Management System</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link" href="{{ route('book.details') }}">Book</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                </ul>
        </nav>
    </div>
        @yield('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>