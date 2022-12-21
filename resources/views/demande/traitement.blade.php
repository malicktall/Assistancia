@extends('admintemplate')

@section('title', 'Demandes / Traitement de la demande: '.$demande->objet)

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

                    <div class="card-body">
                        <h4 class="card-title">Objet : {{ $demande->objet }}</h4>
                        {{-- <hr> --}}
                        {{-- <p class="card-text">{{ $demande->objet }}</p> --}}
                        <p class="card-text">id : {{ $demande->id }}</p>
                        <p class="card-text">Contenu: {{ $demande->contenu }}</p>
                        <p class="card-text">Statut: {{ $demande->statut }}</p>
                        <p class="card-text">Created: {{ $demande->created_at }}</p>
                        <a {{ $operation = 'traitée'}} href="{{ route('demande.operation',compact('demande','operation')) }}" class="btn btn-success">Traitée</a>
                        <a {{ $operation = 'rejetée' }} href="{{ route('demande.operation',compact('demande','operation')) }}" class="btn btn-danger">Rejetée</a>
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>
@endsection



