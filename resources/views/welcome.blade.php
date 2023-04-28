@extends('layout')
    @section('content')
 
        <div class="mt-16"> 
            <p class="text-center text-xl"> Le blog</p>
            <h3 class="font-semibold text-center text-3xl my-5"> Parce que les chats sont à la mode </h3>
            <p class="text-center text-l"> Les dernières nouvelles sur les litières, les croquettes et tout ce qui peut servir votre petit félin</p>

            <div class="w-9/12 h-96 m-auto mt-5">
            <img src='assets/images/header.jpeg' class="w-full h-96 object-cover m-auto">

            <a href=" {{ route('posts.show', $post)}}"><p class=" mt-5 "> <span class="font-semibold"> {{ $post->title }} </span> par   {{ $post->user->name }} </p>
                </a>
            </div>
        </div>


        <div class="mt-24">
            <h3 class="font-semibold text-center text-3xl mb-10"> Les derniers articles </h3>
            <div class=" w-[88rem] flex flex-wrap flex-row justify-between m-auto">

                @foreach ($posts as $post)
                    <div class="ml-10 flex flex-col  w-96">
                        <a href=" {{ route('posts.show', $post)}}"><div class=" w-80 h-64 bg-stone-900 "></div></a>    
                        
                        <p class="text-sm mt-2">{{ $post->created_at->format('d M Y') }} - {{ $post->user->name }} </p>
                        
                        <a href=" {{ route('posts.show', $post)}}"><p class="mt-2 mb-8 list-none"> <span class="font-medium"> {{ $post->title }}</span> </p> </a>
                    </div>
                @endforeach
            </div>
        </div>
            
@endsection