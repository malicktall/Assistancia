@extends('admintemplate')

@section('title')
Demandes
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tous les Demandes</h3>

        
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Objet</th>
                    <th>Contenu</th>
                    <th>Created</th>
                    <th>Creer par</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($demandes as $demande)
                    <tr>
                        <td>{{ $demande->objet }}</td>
                        <td>{{ $demande->contenu }}</td>
                        <td>{{ $demande->created_at}}</td>
                        <td>{{ $demande->user->name}}</td>
                        <td>
                            <a href="{{ route('demande.show', compact('demande')) }}" class="btn btn-sm btn-info">voir</a>
                        </td>
                    </tr>
                @empty
                    <tr>Pas de demande!</tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="row offset-md-7 paginate">{{ $demandes->links() }}</div>
@endsection
