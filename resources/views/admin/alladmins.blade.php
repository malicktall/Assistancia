@extends('admintemplate')

@section('title')
Admins
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tous les Utilisateur</h3>

        
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date Posted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.update', compact('user')) }}" class="btn btn-sm btn-warning">Modifier</a>
                        </td>
                    </tr>
                @empty
                    <tr>No Result Found</tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="row offset-md-10 paginate">{{ $users->links() }}</div>
@endsection
