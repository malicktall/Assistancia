@extends('template')

@section('title', 'Liste des demandes')

@section('body')

<div class="container">
     <div class="row">
        {{-- <div class="buton-create col-12 col-sm-2 col-md-10">
            <a href="{{ route('demande.create') }}" class="btn btn-primary">Nouvelle demande</a>
        </div>

         <div class="card list-card col-12 col-sm-10 col-md-8 ">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <blockquote class="blockquote mb-0">
                  <p>Liste des demandes</p>
                </blockquote>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">objet</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                            <tr class="">
                                <td scope="row">{{$loop->index+1}}</td>
                                <td>{{ $demande->objet }}</td>
                                <td>{{ $demande->contenu }}</td>
                                <td>{{ $demande->statut }}</td>

                                <td>
                                    <a href="{{ route('demande.edit',compact('demande')) }}" class="btn btn-warning">Modifier</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

              </div>
         </div>
     </div>



    <div class="row offset-md-7 paginate py-3 ">{{ $demandes->links() }}</div> --}}

</div> {{-- Annuler --}}
</div>
@endsection












