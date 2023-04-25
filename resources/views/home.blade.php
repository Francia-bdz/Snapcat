@extends('layout')
    @section('content')

    <div class="p-2 h-screen bg-emerald-100">
         <h1 class="font-extrabold text-6xl text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400"> Coucou {{ Auth::user()->name }} ! Bienvenue sur Snapcat </h1>
         <div class="my-6 p-1">
             <a href="{{ route('posts.index') }}" class="text-sky-500 hover:text-sky-700 underline underline-offset-4 font-bold"> Voir les articles </a>
             @can('access admin')
                <br/>
                <br/>
                <a href="{{ route('users.index') }}" class="text-sky-500 hover:text-sky-700 underline underline-offset-4 font-bold"> Voir les utilisateurs </a>
            @endcan
        </div>
         <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class=" bg-sky-500 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-full" >Déconnexion</button>
        </form>
    </div>

    @endsection