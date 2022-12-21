<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                    <a href="{{ route('superadmin') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <p>
                            <i class="nav-icon fas fa-power-off"></i>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div  class="brand-link">  {{-- href="index3.html" --}}
                <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"></a>
                <a href="{{ route('welcome') }}"><span  class="brand-text font-weight-light">Assistancia</span></a>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                    </div>
                    <div class="info">
                        <a {{ $user = Auth::user() }} href="{{ route('user.profile', compact('user')) }}" class="d-block">{{ $user->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('superadmin') }}" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            @if (Auth::user()->role == 'superadmin')
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                            @else
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Demandes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                            @endif
                            <ul class="nav nav-treeview">

                                @auth
                                    @if (Auth::user()->role == 'superadmin')
                                        <li class="nav-item">
                                            <a  href="{{ route('user.allusers') }}" class="nav-link">  {{-- {{ route('user.index') }}--}}
                                                <i class="fas fa-users-cog nav-icon"></i>
                                                <p>Users</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a  href="{{ route('user.alladmins') }}" class="nav-link">  {{-- {{ route('user.index') }}--}}
                                                <i class="fas fa-users-cog nav-icon"></i>
                                                <p>Admins</p>
                                            </a>
                                        </li>
                                    @else
                                        {{-- <li class="nav-item">
                                            <a {{ $statut = 'en attente' }}  href="{{ route('demande.listedemande', compact('statut')) }}" class="nav-link">
                                                <i class="fas fa-users-cog nav-icon"></i>
                                                <p>Demandes en attente</p>
                                            </a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a {{ $statut = 'En cours de traitement'}}  href="{{ route('demande.listedemande', compact('statut')) }}" class="nav-link">  {{-- {{ route('user.index') }}--}}
                                                <i class="fas fa-users-cog nav-icon"></i>
                                                <p>Demandes en cours</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a {{ $statut = 'rejetée' }}  href="{{ route('demande.listedemande', compact('statut')) }}" class="nav-link">  {{-- {{ route('user.index') }}--}}
                                                <i class="fas fa-users-cog nav-icon"></i>
                                                <p>Demandes rejetées</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a {{ $statut = 'traitée' }}  href="{{ route('demande.listedemande', compact('statut')) }}" class="nav-link">  {{-- {{ route('user.index') }}--}}
                                                <i class="fas fa-users-cog nav-icon"></i>
                                                <p>Demandes traitées</p>
                                            </a>
                                        </li>
                                    @endif
                                @endauth

                            </ul>
                        </li>
                        <li class="nav-item">
                             <a {{ $user = Auth::user() }} href="{{ route('user.profile', compact('user')) }}" class="nav-link"> {{--   --}}
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>

                        @if (Auth::user()->role == 'superadmin')
                            <li class="nav-item">
                                <a href="{{ route('demande.all') }}" class="nav-link"> {{-- {{ route('userGetPassword') }} --}}
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Demandes</p>
                                </a>
                            </li>
                        @endif
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
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                                <li class="breadcrumb-item"><a href="{{ route('superadmin') }}">Home</a></li>
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
                    {{-- @include('partials.alert') --}}
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 Tous droit reserves  <a href="{{ route('welcome') }}">  Assistancia</a>.</strong>
        </footer>
        <div id="sidebar-overlay"></div>
    </div>
    <!-- ./wrapper -->



    </body>

</html>














