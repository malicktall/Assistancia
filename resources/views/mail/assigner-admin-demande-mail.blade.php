


@component('mail::message')
# Nouveau demande -{{ $demande->objet }}

Bonjour

Une nouvelle demande a ete cree voici les details :

Objet :  __{{ $demande->objet }}__ <br>
Contenu : __{{ $demande->contenu }}__

@component('mail::button', ['url' => route('demande.assigner', compact('demande'))])
<div onclick="event.preventDefault();
        document.getElementById('').submit();"></div>
Voir la demande
@endcomponent

thanks, <br>
{{ config('app.name') }}
@endcomponent





