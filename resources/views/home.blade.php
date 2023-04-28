@extends('layout')
    @section('content')

    <div class="p-2">
         <h1 class="font-extrabold text-6xl text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400"> Coucou {{ Auth::user()->name }} ! Bienvenue sur Snapcat </h1>
         <div class="my-6 p-1">
             <a href="{{ route('posts.index') }}" class="text-sky-500 hover:text-sky-700 underline underline-offset-4 font-bold"> Voir les articles </a>
             @can('access admin')
                <br/>
                <br/>
                <a href="{{ route('users.index') }}" class="text-sky-500 hover:text-sky-700 underline underline-offset-4 font-bold"> Voir les utilisateurs </a>
            @endcan
        </div>

        
        
        
        @can('access admin')
        <table class="border-separate border border-sky-400 mt-3" >
            <thead>
                <tr>
                    <th class="border border-sky-300">Nom</th>
                    <th class="border border-sky-300">Rôle</th>
                    
                    @can('access superAdmin')
                    <th class="border border-sky-300">Modifier</th>
                    <th class="border border-sky-300">Supprimer</th>
                    @endcan
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="border border-sky-300">
                        <a href="{{ route('users.show', $user) }}" title="Lire l'article" >{{ $user->name }}</a>
                    </td>
                    <td class="border border-sky-300">
                        @foreach ($user->roles as $role)
                        {{ $role->name }}
                        @endforeach
                        {{-- <a href="{{ route('users.show', $user) }}" title="Lire l'article" >{{ $user->roles }}</a> --}}
                    </td>
                    
                    @can('access superAdmin')
                    
                    <td class="border border-sky-300">
                        <a href="{{ route('users.edit', $user) }}" title="Modifier le nom de l'utilisateur" >Modifier</a>
                    </td>
                    <td class="border border-sky-300">
                        <form method="POST" action="{{ route('users.destroy', $user) }}" >
                            <!-- CSRF token -->
                            @csrf
                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                            @method("DELETE")
                            <input type="submit" value="x Supprimer" >
                        </form>
                    </td>
                    
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
        @endcan
        
        <form action="{{ route('logout') }}" method="post">
           @csrf
           <button class=" bg-sky-500 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-full mt-6" >Déconnexion</button>
       </form>

    </div>

    @endsection