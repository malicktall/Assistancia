@extends('admintemplate')

@section('title')
Demandes
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tous les demandes</h3>

        <div class="card-tools">

        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Objet</th>
                    <th>Contenu</th>
                    <th>Created</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($demandes as $demande)
                    <tr>
                        <td>{{ $demande->objet}}</td>
                        <td>{{ $demande->contenu }}</td>
                        <td>{{ $demande->created_at }}</td>
                        <td>{{ $demande->statut }}</td>
                        <td>
                        @if ( $demande->statut == 'En cours de traitement')
                            <a  href="{{ route('demande.traitement',compact('demande')) }}" class="btn btn-sm btn-warning">Traitement</a>

                        @else
                            <a href="{{ route('demande.show', compact('demande')) }}" class="btn btn-sm btn-info">Voir</a>
                        @endif
                        </td>
                    </tr>
                @empty
                    <tr>No Result Found</tr>
                @endforelse
            </tbody>
        </table>
    </div>

  </div>
  <div class="row offset-md-10 paginate">{{ $demandes->links() }}</div>
@endsection
