@extends('layout')
    @section('content')
         <h1> Coucou {{ Auth::user()->name }}, bienvenue sur Snapcat </h1>
         <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Déconnexion</button>
        </form>
        <div class="">
           <a href="{{ route('users.index') }}"> Voir les utilisateurs </a>
  
        </div>
    @endsection