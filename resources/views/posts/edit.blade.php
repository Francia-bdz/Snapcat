@extends('layout')
	@section('content')

	<h2> Modifier un article </h2>
		
	<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
	
		@method('PUT')

		@csrf
		
		<p>
			<label for="title" >Titre de l'article</label><br/>

			<input type="text" name="title" value="{{ $post->title }}"  id="title" placeholder="Le titre de l'article" class="border">

		</p>

		<p>
			<label for="name" >Contenu</label><br/>

			<textarea name="content" id="content" placeholder="Le contenu de l'article" class="border w-1/3">{{ $post->content }}</textarea>
		</p>


	
		<input type="submit" name="valider" value="Valider" class=" transition ease-in-out rounded bg-slate-400 py-2 px-3 mt-2 hover:bg-slate-300">

	</form>
</div>
@endsection
		

