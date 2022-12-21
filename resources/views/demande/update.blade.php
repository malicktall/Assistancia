@extends('template')

@section('title', 'page modification  de demande'.$demande->objet)

@section('body')

<div class="container create">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-4 col-md-8">
            <form method="POST" action="{{ route('demande.update', compact('demande')) }}" class="form-register">
            @method('put')
            @csrf
                <div class="row mb-3">
                    <label for="objet" class=" col-md-4 col-form-label text-md-end">{{ __('Objet') }}</label>

                        <div class="col-md-6">
                            <input id="objet" type="text" class="form-control @error('objet') is-invalid @enderror" name="objet" value="{{ old('objet') ?? $demande->objet }} "  autocomplete="objet" autofocus>
                             @error('objet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>

                <div class="row mb-3">
                    <label for="contenu" class="col-md-4 col-form-label text-md-end">{{ __('contenu ') }}</label>

                    <div class="col-md-6">
                        {{-- <input id="contenu" type="contenu" class="form-control @error('contenu') is-invalid @enderror" name="contenu" value="{{ old('contenu') }}" required autocomplete="contenu"> --}}
                        <textarea class="form-control @error('contenu') is-invalid @enderror" name="contenu"  autocomplete="contenu"  rows="3">{{ old('contenu') ?? $demande->contenu }} </textarea>
                        @error('contenu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary submit create-button">
                            {{ __('Valider') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection






