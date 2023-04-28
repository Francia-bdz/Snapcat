@extends('layout')
    @section('content')

    <div class="m-10">
        <div class="p-2">
            <h1 class="font-extrabold text-5xl  "> Coucou {{ Auth::user()->name }} ! Bienvenue sur Snapcat </h1>
            <div class="my-6 p-1">

                <a href="{{ route('posts.create') }}" class=" hover:text-stone-700 underline underline-offset-4 font-bold text-lg"> Écrire un article </a>

                @if (count($myPosts) > 0)
                    <h3 class="text-xl mt-5">Tous vos articles </h3>
                    @foreach ($myPosts as $post)
                        <p>{{ $post->title }}</p>
                    @endforeach
                @endif

                @can('access admin')
                    <br/>
                    <br/>
                    <a href="{{ route('users.index') }}" class="text-sky-500 hover:text-sky-700 underline underline-offset-4 font-bold"> Voir les utilisateurs </a>
                @endcan

            </div>
    
            @can('access admin')
            <table class=" mt-3" >
                <thead>
                    <tr>
                        <th class="border ">Nom</th>
                        <th class="border ">Rôle</th>
                        
                        @can('access superAdmin')
                        <th class="border ">Modifier</th>
                        <th class="border ">Supprimer</th>
                        @endcan
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="border ">
                            <a href="{{ route('users.show', $user) }}" title="Lire l'article" >{{ $user->name }}</a>
                        </td>
                        <td class="border ">
                            @foreach ($user->roles as $role)
                            {{ $role->name }}
                            @endforeach
                        </td>
                        
                        @can('access superAdmin')
                        
                        <td class="border ">
                            <a href="{{ route('users.edit', $user) }}" title="Modifier le nom de l'utilisateur" >Modifier</a>
                        </td>
                        <td class="border ">
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
            @endcan
            
            <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class=" text-white hover:bg-stone-600 bg-stone-900 p-3 rounded-xl mt-6" >Déconnexion</button>
        </form>

        </div>
    </div>

    @endsection