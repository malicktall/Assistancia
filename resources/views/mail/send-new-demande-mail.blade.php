{{-- <x-mail::message>
# Nouveau demande -{{ $demande->objet }}

Bonjour {{ $demande->user->name }}

Une nouvelle demande a ete cree voici les details :

*Objet : * __{{ $demande->objet }}__
*Contenu :* __{{ $demande->contenu }}__

<x-mail::button :url="route('demande.show', compact('demande'))">
 Afficher la demande
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}


@component('mail::message')
# Nouveau demande -{{ $demande->objet }}

Bonjour {{ $demande->user->name }} 

Une nouvelle demande a ete cree voici les details :

Objet :  __{{ $demande->objet }}__ <br>
Contenu : __{{ $demande->contenu }}__

@component('mail::button', ['url' => route('demande.show', compact('demande'))])
<div onclick="event.preventDefault();
        document.getElementById('').submit();"></div>
Afficher la demande
@endcomponent

thanks, <br>
{{ config('app.name') }}
@endcomponent















