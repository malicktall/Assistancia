@extends('admintemplate')

@section('title')
Create user
@endsection

@section('content')
<section class="content">
    <div class="">
        <div class="row">

            <div class="col-md-10 mx-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Nouveau Utilisateur</h4>
                    </div>
                    <div class="card-body">
                        {{-- <div> --}}

                            <div>
                                <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name"  id="name" class="form-control @error('email') is-invalid @enderror"  placeholder="Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail Address">
                                                @error('siteemail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror"  placeholder="Par defaut: user" value="" >
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Valider</button>
                                                {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
