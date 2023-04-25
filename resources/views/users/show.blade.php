@extends("layout")
@section("content")

<div class="container mx-2 my-2 px-4">
	<h1 class="text-4xl font-bold">Utilisateur</h1>
    
    <div class="flex flex-col md:flex-row">

        <div class="w-full md:w-2/3">
            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
            <p class="text-gray-700">{{ $user->email }}</p>
            
        </div>

    </div>
    <p class="text-l font-normal leading-normal mt-2 mb-2 text-gray-500"><a href="{{ route('users.index') }}" title="Retourner aux utilisateurs" >Retourner aux utilisateurs</a></p>
@endsection