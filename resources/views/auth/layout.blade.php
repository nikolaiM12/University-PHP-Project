<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Library Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    </head>
    <body class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a class="d-inline-flex link-body-emphasis text-decoration-none" href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="currentColor" class="bi bi-book-half" viewbox="0 0 24 24">
                        <path d="M12.5 4.406c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V4.406zM12 3.502C11.015 2.655 9.587 2.529 8.287 2.66c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 3 3.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 21 14.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C15.413 2.309 13.985 2.436 13 3.283z"></path>
                    </svg>
                    <span class="ms-2">Library Management System</span>
                </a>
            </div>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('home.index', ['controller' => 'HomeController', 'action' => 'index'])}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('home.about', ['controller' => 'HomeController', 'action' => 'about']) }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('home.contact', ['controller' => 'HomeController', 'action' => 'contact']) }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('author.index', ['controller' => 'AuthorController', 'action' => 'index']) }}">Author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('book.index', ['controller' => 'BookController', 'action' => 'index']) }}">Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('category.index', ['controller' => 'CategoryController', 'action' => 'index']) }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('loan.index', ['controller' => 'LoanController', 'action' => 'index']) }}">Loan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('notification.index', ['controller' => 'NotificationController', 'action' => 'index']) }}">Notification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('review.index', ['controller' => 'ReviewController', 'action' => 'index']) }}">Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('user.index', ['controller' => 'UserController', 'action' => 'index']) }}">User</a>
                </li>
            </ul>
            <div class="col-md-3 text-end">
                <a href="{{ route('register') }}" class="btn btn-outline-primary me-2">Register</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
            </div>
        </header>
        @yield('content')
        <footer class="border-top footer bg-primary text-dark fixed-bottom">
            <div class="text-center">
                &copy; 2023 - Library Management System - Made by Nikolai Mashkov
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    </body>
</html>