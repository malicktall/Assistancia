<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
     <!-- Font Awesome icons (free version)-->
     <script src="{{ url('https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}" crossorigin="anonymous"></script>
     <!-- Google fonts-->
     <link href="{{ url('https://fonts.googleapis.com/css?family=Montserrat:400,700') }}" rel="stylesheet" type="text/css" />
     <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('asseter/app.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet" /> --}}
    {{-- {{ HTML::style(); }} --}}

    <title>@yield('title')</title>

     <header>

        <nav class="navbar navbar-expand-md navbar-light bg-white ">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="bg-warning">Assis</span>tancia
                </a> --}}
            @guest
                @if (Route::has('login'))
                    <a class="navbar-brand" href="{{ route('welcome') }}">Assistancia</a>
                @endif

                {{-- @if (Route::has('register'))
                    <a class="navbar-brand" href="{{ route('admin') }}">Assistancia</a>
                @endif --}}
            @else
                @if (Auth::user()->role == 'admin')
                    <a class="navbar-brand" href="{{ route('admin') }}">Assistancia</a>
                @else
                    <a class="navbar-brand" href="{{ route('home') }}">Assistancia</a>
                @endif
            @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        @if (Auth::user()->role  == 'admin')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Demande
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" {{ $statut = 'En attente' }}  href="{{ route('demande.listedemande', compact('statut'))  }}">
                                        {{ __('Demandes Attente') }}
                                    </a>

                                    <a class="dropdown-item" {{ $statut = 'En cours de traitement' }}  href="{{ route('demande.listedemande', compact('statut'))  }}">
                                        {{ __('Demandes en cours') }}
                                    </a>

                                    <a class="dropdown-item" {{ $statut = 'rejetée' }}  href="{{ route('demande.listedemande', compact('statut'))  }}">
                                        {{ __('Demandes Rejetées') }}
                                    </a>

                                    <a class="dropdown-item" {{ $statut = 'traitée' }}  href="{{ route('demande.listedemande', compact('statut'))  }}">
                                        {{ __('Demandes traitées') }}
                                    </a>


                                </div>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('demande.create') }}">{{ __('Faire une demande') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('demande.index') }}">{{ __('Voir mes demandes') }}</a>
                                </li>

                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('demande.create') }}">{{ __('Faire une demande') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('demande.index') }}">{{ __('Voir mes demandes') }}</a>
                            </li>
                        @endif


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


</header>
</head>
<body>

        <div class="container-fluid contenu ">
            <div class="row">

                    @yield('body')


            </div>

        </div>


        <!-- Footer-->
        <footer class="footer py-4 ">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-4 col-12 text-center text-lg-start">Copyright &copy; {{ date('Y') }} Tous droit reserves

                    </div>
                    <div class="col-lg-4 col-12 col-md-4  text-center my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 col-12 col-md-4  text-center text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>




        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        </script>


        <script src="{{ asset('js/scripts.js') }}"></script>

        <script src="{{ url('https://cdn.startbootstrap.com/sb-forms-latest.js') }}"></script>

</body>


</html>




