<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Assiatancia</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="{{ url('https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="{{ url('https://fonts.googleapis.com/css?family=Montserrat:400,700') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700') }}" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css') }}"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        {{-- <link rel="stylesheet" href="{{ asset('asseter/app.css')}}"> --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Assistancia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-e py-4 py-lg-0 offset-md-2 ">



                    </ul>
                    @if (Route::has('login'))

                        <ul class="navbar-nav text-uppercase ms-e py-4 py-lg-0 offset-md-2">
                            <li class="nav-item"><a class="nav-link" href="#about">Contact</a></li>
                        @auth

                            @if (Auth::user()->role == 'superadmin')
                                <li class="nav-item" ><a class="nav-link" href="{{ route('superadmin')}}" >Home</a></li>
                            @elseif (Auth::user()->role == 'admin')
                                 <li class="nav-item" ><a class="nav-link" href="{{ route('superadmin') }}" >Home</a></li>
                            @else
                                <li class="nav-item" ><a class="nav-link" href="{{ url('/home') }}" >Home</a></li>
                            @endif

                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" >Log in</a></li>

                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @endif

                        @endauth
                    {{-- </div> --}}
                </ul>
                    @endif
                </div>

            </div>
        </nav>




        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue a Assistancia!</div>
                <div class="masthead-heading text-uppercase">Une plateforme qui vous facilite vos demandes</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('login') }}">Commencer</a>
            </div>
        </header>



        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-4 col-12 text-center text-lg-start">Copyright &copy; {{ date('Y') }} Tous droit reserves

                    </div>
                    <div class="col-lg-4 col-12 text-center my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 col-12 text-center text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="{{ url('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js') }}"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>

        <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js') }}"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        </script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>

        <script src="{{ url('https://cdn.startbootstrap.com/sb-forms-latest.js') }}"></script>
    </body>
</html>





















