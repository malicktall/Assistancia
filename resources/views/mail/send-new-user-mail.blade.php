@component('mail::message')
# Bienvenue à - {{ config('app.name') }}

Bonjour cher(e) {{ $user->name }}

Une nouvelle compte de {{ config('app.name') }} a ete cree  à votre nom
ici tu peux faire enorme chose comme formuler des demandes etc...

Pour voir plus de detail  *cliquer sur le bouton ci-dessus*

@component('mail::button', ['url' => route('user.show', compact('user'))])
{{-- <div onclick="event.preventDefault();
        document.getElementById('').submit();"></div> --}}
plus de détails
@endcomponent

thanks, <br>
{{ config('app.name') }}
@endcomponent
