@extends('layout')
	@section('content')

	<h2> Créer un article </h2>
		
	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
	
		@csrf
		
		<p>
			<label for="title" >Titre de l'article</label><br/>

			<input type="title" name="title"  id="title" placeholder="Le titre de l'article" class="border">

		</p>

		<p>
			<label for="name" >Contenu</label><br/>

			<textarea name="content"  id="content" placeholder="Le contenu de l'article" class="border w-1/3"></textarea>
		</p>

		
		<input type="submit" name="valider" value="Valider" class=" transition ease-in-out rounded bg-slate-400 py-2 px-3 mt-2 hover:bg-slate-300">

	</form>
</div>
@endsection
		