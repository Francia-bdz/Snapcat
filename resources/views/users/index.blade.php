@extends('layout')
    @section('content')

    <h2> Liste des utilisateurs </h2>

    @if(session()->has('success'))
        <div class="alert alert_success">
            {{ session()->get('success') }}
        </div>
    @endif



    <table class="border-separate border border-slate-400 mt-3" >
        <thead>
            <tr>
                <th class="border border-slate-300">Nom</th>
                <th class="border border-slate-300">Rôle</th>
                <th class="border border-slate-300">Modifier</th>
                <th class="border border-slate-300">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="border border-slate-300">
                    <a href="{{ route('users.show', $user) }}" title="Lire l'article" >{{ $user->name }}</a>
                </td>
                <td class="border border-slate-300">
                    <a href="{{ route('users.show', $user) }}" title="Lire l'article" >{{ $user->role }}</a>

                    {{ dd($user) }}

                </td>

                <td class="border border-slate-300">
                    <a href="{{ route('users.edit', $user) }}" title="Modifier l'article" >Modifier</a>
                </td>
                <td class="border border-slate-300">
                    <form method="POST" action="{{ route('users.destroy', $user) }}" >
                        <!-- CSRF token -->
                        @csrf
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        @method("DELETE")
                        <input type="submit" value="x Supprimer" >
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection