<x-mail::message>
# Nouvelle article ajouté 
## Bonjour,
Un nouvel article a été créé.
**Nom de l'article** : {{ $article->title }}
@if($article->online)
Article postée
@else
Article non postée
@endif

<x-mail::button :url="''">
Afficher les détails
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
