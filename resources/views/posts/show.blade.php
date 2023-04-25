@extends("layout")
@section("title", $post->title)
@section("content")

	<div class="container mx-auto px-4">
		<h1 class="text-6xl font-normal leading-normal ">{{ $post->title }}</h1>
		
		
		<div>{{ $post->content }}</div>


		<div>Par {{ $post->user->name }}</div>
		
		{{-- <h2 class="text-2xl font-normal leading-normal mt-2 mb-2 text-gray-800">Catégories associées</h2>
		
		<ul class="list-disc list-inside">
		</ul> --}}


		<p class="text-l font-normal leading-normal mt-2 mb-2 text-gray-500"><a href="{{ route('posts.index') }}" title="Retourner aux articles" >Retourner aux posts</a></p>
	</div>
@endsection