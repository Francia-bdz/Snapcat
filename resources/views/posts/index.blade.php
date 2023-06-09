@extends('layout')
    @section("title", "Tous les articles")
    @section("content")

    <div class="container mx-auto px-4 ">

		<h1 class="text-4xl font-bold">Tous les articles </h1>

		@if(session()->has('success'))
			<div class="alert alert_success">
				{{ session()->get('success') }}
			</div>
		@endif

		@if(session()->has('error'))
			<div class="alert alert_error">
				{{ session()->get('error') }}
			</div>

		@endif

		
		
		<p class="mt-3 hover:text-gray-500">
			@can('access writer')
			<a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouveau post</a>
			@endcan
		</p>


		
		@if($myPosts->isNotEmpty())
		<h2 class="my-2 font-bold">Vos articles</h2>
		<!-- Le tableau pour lister les articles/posts -->
		<table class="border-separate border border-slate-400 mt-3" >
			<thead>
				<tr>
					<th class="border border-slate-300">Titre</th>
					<th class="border border-slate-300">Catégorie</th>
					<th class="border border-slate-300">Opérations</th>
				</tr>
			</thead>
			<tbody>
				<!-- On parcourt la collection de Post -->
				@foreach ($myPosts as $post)
				<tr>
					<td class="border border-slate-300">
						<!-- Lien pour afficher un Post : "posts.show" -->
						<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->title }}</a>
					</td>
					<td class="border border-slate-300">
						<!-- Lien pour modifier un Post : "posts.edit" -->
						<a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
					</td>
					<td class="border border-slate-300">
						<!-- Formulaire pour supprimer un Post : "posts.destroy" -->
						<form method="POST" action="{{ route('posts.destroy', $post) }}" >
							<!-- CSRF token -->
							@csrf
							<!-- <input type="hidden" name="_method" value="DELETE"> -->
							@method("DELETE")
							<input type="submit" value="x Supprimer" >
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif

		

		<h2 class="my-2 font-bold">Les articles disponibles sur le site</h2>

		<table class="border-separate border border-slate-400 my-3" >
			<thead>
				<tr>
					<th class="border border-slate-300">Titre</th>
					<th class="border border-slate-300">Par</th>
					<th class="border border-slate-300">Dernière modification</th>
				</tr>
			</thead>
			<tbody>
				<!-- On parcourt la collection de Post -->
				@foreach ($posts as $post)
				<tr>
					<td class="border border-slate-300">
						<!-- Lien pour afficher un Post : "posts.show" -->
						<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->title }}</a>
					</td>
					<td class="border border-slate-300">
						<!-- Lien pour afficher un Post : "posts.show" -->
						<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->user->name }}</a>
					</td>
					<td class="border border-slate-300">
						<!-- Lien pour afficher un Post : "posts.show" -->
						<a href="{{ route('posts.show', $post) }}" title="Lire l'article" >{{ $post->updated_at->format('d M Y - H:m') }}</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</div>
		
@endsection