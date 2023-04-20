@extends('layout')
    @section('content')
         <h1> Coucou {{ Auth::user()->name }}, bienvenue sur Snapcat </h1>
    @endsection