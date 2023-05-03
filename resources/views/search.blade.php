@extends('layout')
    @section('content')

    <form method="GET" action="{{ route('search') }}">
        @csrf
        <input type="text" name="search" placeholder="Recherche...">
        <button type="submit">Rechercher</button>
    </form>

    @if($posts->isNotEmpty())

    <h2 class="my-2">Résultats de la recherche :</h2>
    @foreach ($posts as $post)
        <div class="post-list">
                <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
        </div>
    @endforeach
@else 
    <div>
        <h2 class="my-2">Pas d'article trouvé
        </h2>
    </div>
@endif

    @endsection