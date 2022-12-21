@extends('admintemplate')

@section('content')

<section class="content">
    <div class="py-3">
        <div class="row">


        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class=" py-3 mx-5 content-body">
            <div class="mx-4 container py-5">

                <div class="big-title">Bienvenue!</div>
                    <div class="masthead-heading ">Utilisez la barre latérale pour ajouter, modifier ou supprimer du contenu.</div>
                    <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('welcome') }}">Assistancia</a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
