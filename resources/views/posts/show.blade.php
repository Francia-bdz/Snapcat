@extends("layout")
@section("title", $post->title)
@section("content")

	<div class="container mx-auto px-4">
		<h1 class="text-6xl font-normal leading-normal ">{{ $post->title }}</h1>
		
		
		<div>{{ $post->content }}</div>


		<div>Par {{ $post->user->name }}</div>

		<br/>

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
		
		{{-- <h2 class="text-2xl font-normal leading-normal mt-2 mb-2 text-gray-800">Catégories associées</h2>
		
		<ul class="list-disc list-inside">
		</ul> --}}

	
	 <h2 class="my-2">Ajouter un commentaire</h2>
		<form method="POST" action="{{ route('comments.store', $post) }}" >
			@csrf
			<textarea name="content" class="border" ></textarea>
			<input type="submit" value="Ajouter" >
		</form>


		<h2 class="text-2xl font-normal leading-normal mt-2 mb-2 text-gray-800">Commentaires</h2>
		<ul class="list-disc list-inside">
			
			@foreach($post->comments as $comment)
			
			{{ dd($post->comments) }}
				<li>{{ $comment->content }} par {{ $comment->user_id}}</li>

				@if ($comment->user_id == Auth::user()->id)
					<form method="POST" action="{{ route('comments.destroy', $comment) }}" >
						@method('DELETE')
						@csrf
						<input type="submit" value="Supprimer" >
					</form>
				@endif

			@endforeach
		</ul> 




		<p class="text-l font-normal leading-normal mt-2 mb-2 text-gray-500"><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
	</div>
@endsection