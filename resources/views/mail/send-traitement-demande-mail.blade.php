{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}


@component('mail::message')
# Traitement demande -{{ $demande->objet }}

Bonjour {{ $demande->user->name }}

Votre demande a ete consulté voici les details :

Objet :  __{{ $demande->objet }}__ <br>
Contenu : __{{ $demande->contenu }}__
Contenu : __{{ $demande->statut }}__
shjresxdcfgvbjnhytresdcfvbnjhytresdcfgvhjuytredfcvghgtresdcfvgtfredsdcfvg
@component('mail::button', ['url' => route('demande.show', compact('demande'))])
<div onclick="event.preventDefault();
        document.getElementById('').submit();"></div>
Afficher la demande
@endcomponent

thanks, <br>
{{ config('app.name') }}
@endcomponent
