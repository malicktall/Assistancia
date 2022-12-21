@extends('template')

@section('title', 'page de modification de compde'.$user->name)
@section('body')


<div class="container">


 <div class="container col-md-9 py-5 " >
    <div class="card card-show">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <hr>
            <div class="row justify-content-center ">
                <div class="col-12 col-sm-4 col-md-8 ">
                    {{-- <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body"> --}}
                            <form method="POST" action="{{  route('user.update', compact('user')) }}" class="form-register ">
                                @method('put')
                                @csrf

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="name" >{{ __('Name') }}</label>

                                        {{-- <div class="col-md-6"> --}}
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}"  autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        {{-- </div> --}}

                                    </div>



                                    <div class="col-12 py-3">
                                        <label for="email" >{{ __('Email Address') }}</label>

                                        {{-- <div class="col-md-6"> --}}
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email  }}"  autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        {{-- </div> --}}
                                    </div>






                                    <div class="col-12 col-md-6 offset-md-8">
                                        {{-- <div class="col-md-6 offset-md-4"> --}}
                                            <button type="submit" class="btn btn-info submit">
                                                {{ __('Mettre a jour mon profil') }}
                                            </button>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
        </div>
     </div>


 </div>


 <div class="container col-md-9  py-3 ">


            <div class="card card-show">
                {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}

                <div class="card-body">

                    <h5 class="card-title">Title</h5> <hr>

                    <div class="row justify-content-center">
                    <div class="col-12 col-sm-4 col-md-8">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <label for="email" >{{ __('Email Address') }}</label>

                                        {{-- <div class="col-md-6"> --}}
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        {{-- </div> --}}
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="password" >{{ __('Password') }}</label>

                                        {{-- <div class="col-md-6"> --}}
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        {{-- </div> --}}
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                                        {{-- <div class="col-md-6"> --}}
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        {{-- </div> --}}
                                    </div>

                                    <div class="row py-4">
                                        <div class="col-md-6 offset-md-8">
                                            <button type="submit" class="btn btn-info">
                                                {{ __('Changer le mot de passe') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

</div>
</div>
@endsection
