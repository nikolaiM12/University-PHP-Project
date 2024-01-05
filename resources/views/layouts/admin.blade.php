<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>&#128218; Library Management System</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/cropper.css') }}" rel="stylesheet">
</head>
<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home.index', ['controller' => 'HomeController', 'action' => 'index']) }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home.contact', ['controller' => 'HomeController', 'action' => 'contact']) }}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('author.index', ['controller' => 'AuthorController', 'action' => 'index']) }}">Author</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('book.index', ['controller' => 'BookController', 'action' => 'index']) }}">Book</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('category.index', ['controller' => 'CategoryController', 'action' => 'index']) }}">Category</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('loan.index', ['controller' => 'LoanController', 'action' => 'index']) }}">Loan</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('notification.index', ['controller' => 'NotificationController', 'action' => 'index']) }}">Notification</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('review.index', ['controller' => 'ReviewController', 'action' => 'index']) }}">Review</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('user.index', ['controller' => 'UserController', 'action' => 'index']) }}">User</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="d-inline-flex link-body-emphasis text-decoration-none" href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="currentColor" class="bi bi-book-half" viewbox="0 0 24 24">
                            <path d="M12.5 4.406c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V4.406zM12 3.502C11.015 2.655 9.587 2.529 8.287 2.66c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 3 3.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 21 14.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C15.413 2.309 13.985 2.436 13 3.283z"></path>
                        </svg>
                        <span class="ms-1">Library Management System</span>
                    </a>
                </li>
                <!--<li class="nav-item d-none d-sm-inline-block ml-3">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <p>
                            <i class="fa-solid fa-power-off"></i>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>-->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-5">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLMS 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/' . auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}" class="nav-link">
                                        <i class="fas fa-bomb nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}" class="nav-link">
                                        <i class="fas fa-bomb nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}" class="nav-link">
                                        <i class="fas fa-users-cog nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.profile', ['controller' => 'UserController', 'action' => 'profile']) }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-bell nav-icon"></i>
                                <p>Notifications</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('profileChangePhoto') }}" class="nav-link">
                                <i class="fas fa-image nav-icon"></i>
                                <p>Change Profile Photo</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('userGetPassword') }}" class="nav-link">
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 399px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('pageName')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="text-center">
                <strong>&copy; 2023 <a href="#">AdminLMS.io</a>. <em>Library Management System - Made by Nikolai Mashkov.</em></strong> All rights reserved.
            </div>
        </footer>

                
        <div id="sidebar-overlay"></div>
    </div>
    <!-- ./wrapper -->
    </body>
</html>