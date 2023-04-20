@extends('layout')
    @section('content')
         <h1> Coucou {{ Auth::user()->name }}, bienvenue sur Snapcat </h1>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" >
            @csrf  
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> Se déconnecter
            </a>
        </form>
    @endsection