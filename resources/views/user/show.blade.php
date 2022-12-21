@extends('template')

@section('title', 'Détails de la user: '.$user->name)

@section('body')
    <div class="container col-md-8 py-5">
        <div class="card card-show">
            <div class="card-body ">
                <h4 class="card-title">{{ $user->name }}</h4>
                <hr>
                <p class="card-text">nom: {{ $user->name   }}</p>
                <p class="card-text">email: {{ $user->email }}</p>
                <p class="card-text">password: {{ $user->password }}</p>

               <div class="offset-md-5">
                    <a href="{{ route('user.edit',compact('user')) }}" class="btn btn-warning">Modifier</a>
               </div>
            </div>

        </div>
    </div>


    {{-- <div id="my-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Title</h5>
                    <p>Text</p>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
