@extends("layouts.app")
@section("content")

<div class="container mx-2 my-2 px-4">
	<h1 class="text-4xl font-bold">Modifier le nom de l'utilisateur</h1>

	<!-- Si nous avons un Post $post -->

	<!-- Le formulaire est géré par la route "posts.update" -->
	<form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

		<!-- Le token CSRF -->
		@csrf
		
		<p>
			<label for="name" >Nom de l'utilisateur</label><br/>

			<input type="text" name="name" value="{{ isset($user->name) }}"  id="name" placeholder="Le Nom du de l'utilisateur" class="border">

		</p>


	
		<p>
			<label for="content" >Contenu</label><br/>

			<!-- S'il y a un $post->content, on complète la valeur du textarea -->
			<textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" class="border">{{ isset($post->content) ? $post->content : old('content') }}</textarea>

			<!-- Le message d'erreur pour "content" -->
			@error("content")
			<div>{{ $message }}</div>
			@enderror
		</p>


		<input type="submit" name="valider" value="Valider" class=" transition ease-in-out rounded bg-slate-400 py-2 px-3 mt-2 hover:bg-slate-300">

	</form>
</div>
@endsection