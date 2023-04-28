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

	
	 <h2 class="my-2">Ajouter un commentaire</h2>
		<form method="POST" action="{{ route('comments.store', $post) }}" >
			@csrf
			<textarea name="content" class="border" ></textarea>
			<input type="submit" value="Ajouter" >
		</form>


		<h2 class="text-2xl font-normal leading-normal mt-2 mb-2 text-gray-800">Commentaires</h2>
		<ul class="list-disc list-inside">
			
			@foreach($post->comments as $comment)
			
				@if ($comment->parent_id==NULL)

					<li class="mt-2">{{ $comment->content }} par 
					
					@if ($comment->user_id == Auth::user()->id)
						
						<span class="font-medium "> Moi </span> </li>		
						<form method="POST" action="{{ route('comments.destroy', $comment) }}" >
							@method('DELETE')
							@csrf
							<input type="submit" value="Supprimer" class="text-xs bg-sky-500 hover:bg-sky-400 cursor-pointer my-1 px-2 py-1 text-white rounded" >
						</form>

					@else

						{{ $comment->user->name}}</li>

					@endif

				@endif
				
				@foreach($comment->commentChild as $comment)

					<li class="ml-5 list-none">Réponse de {{ $comment->user->name }} : {{ $comment->content }} </li>

				@if ($comment->user_id == Auth::user()->id)
						
					<span class="font-medium "> Moi </span> </li>		
					<form method="POST" action="{{ route('comments.destroy', $comment) }}" >
						@method('DELETE')
						@csrf
						<input type="submit" value="Supprimer" class="text-xs bg-sky-500 hover:bg-sky-400 cursor-pointer my-1 px-2 py-1 text-white rounded" >
					</form>

				@else

					{{ $comment->user->name}}</li>

				@endif

				@endforeach

				@if ($comment->parent_id==NULL)
					
					<div class="ml-7">
						<h3 class="my-2">Répondre au commentaire</h3>

						<form method="POST" action="{{ route('comments.store', $post) }}" >
							@csrf
							<textarea name="content" class="border" ></textarea>

							<input type="hidden" name="parent_id" value={{$comment->id}}>

							<input type="submit" value="Ajouter" >
						</form>


					</div>
				@endif

			@endforeach
		</ul> 

		<p class="text-l font-normal leading-normal mt-2 mb-2 text-gray-500"><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
	</div>
@endsection