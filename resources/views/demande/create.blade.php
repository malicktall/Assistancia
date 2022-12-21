@extends('template')

@section('title', 'page creation de demande')

@section('body')

{{-- <div class="container create"> --}}
    <div class="row justify-content-center py-5">
        {{-- <div class="">
            <p class="col-12 col-sm-2 col-md-6 text py-5">Demandes</p>
         </div> --}}
        <div class="col-md-6 login-col py-5">

                <div class="card ">
                    <div class="card-body">
                        <form method="POST" action="{{ route('demande.store') }}" class="form-register">
                            @csrf

                            <div class="row mb-3">
                                <label for="objet" class="  col-form-label text-md-start">{{ __('Objet') }}</label>

                                <div class="">
                                    <input id="objet" type="text" class="form-control @error('objet') is-invalid @enderror" name="objet" value="{{ old('objet') }}"  autocomplete="objet" autofocus>

                                    @error('objet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="contenu" class="col-form-label text-md-start">{{ __('contenu ') }}</label>

                                <div class="">
                                    {{-- <input id="contenu" type="contenu" class="form-control @error('contenu') is-invalid @enderror" name="contenu" value="{{ old('contenu') }}" required autocomplete="contenu"> --}}
                                    <textarea class="form-control @error('contenu') is-invalid @enderror" name="contenu" value="{{ old('contenu') }}"  autocomplete="contenu"  rows="3"></textarea>
                                    @error('contenu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="row mb-0">
                                <div class="">
                                    <button type="submit" class="btn btn-success create-button ">
                                        {{ __('Valider') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>

    </div>
{{-- </div> --}}
@endsection







