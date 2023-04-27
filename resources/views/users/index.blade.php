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

                @can('access superAdmin')
                <th class="border border-slate-300">Modifier</th>
                <th class="border border-slate-300">Supprimer</th>
                @endcan

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="border border-slate-300">
                    <a href="{{ route('users.show', $user) }}" title="Lire l'article" >{{ $user->name }}</a>
                </td>
                <td class="border border-slate-300">
                    @foreach ($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                    {{-- <a href="{{ route('users.show', $user) }}" title="Lire l'article" >{{ $user->roles }}</a> --}}
                </td>

                @can('access superAdmin')

                <td class="border border-slate-300">
                    <a href="{{ route('users.edit', $user) }}" title="Modifier le nom de l'utilisateur" >Modifier</a>
                </td>
                <td class="border border-slate-300">
                    <form method="POST" action="{{ route('users.destroy', $user) }}" >
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="x Supprimer" >
                    </form>
                </td>
                
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('home') }}" class="grey"> Retour vers la home </a>
@endsection