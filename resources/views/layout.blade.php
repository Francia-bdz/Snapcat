<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    <nav class="flex flex-row justify-between items-center text-lg mx-10 mt-5">
        <li class="flex flex-row items-center list-none">
            <div class="flex flex-row items-center mr-8"> 
                <img src="{{ asset('assets/images/cat.svg') }}" class="mr-1">
                <p class="font-semibold text-stone-900" >Snapcat</p>
            </div>
            <a href="{{ url('/') }}" class=" text-gray-900 hover:text-gray-500 mr-8">Accueil</a>
            <a href="{{ route('posts.index') }}" class=" text-gray-900 hover:text-gray-500 ">Articles</a>
        </li>
    @if (Route::has('login'))
        <div class="">
            @auth
                <a href="{{ url('/home') }}" class="font-semibold text-gray-900 hover:text-gray-500 ">Le hub</a>
            @else
                <a href="{{ route('login') }}" class=" text-gray-900 hover:text-gray-500 mr-4 ">Se connecter</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class=" text-white hover:bg-gray-600 bg-gray-900 p-3 rounded-xl">S'inscrire</a>
                @endif
            @endauth
        </div>
    @endif
    </nav>

    @yield('content')

    <footer class="relative bottom-0 left-0 right-0 bg-gradient-to-r from-purple-500 to-pink-500 px-44 mt-auto">
        <ul class="py-6">
            <li> <a href="" class="text-white">A propos</a> </li>
            <li> <a href="" class="text-white">Contact</a> </li>
            <li> <a href="" class="text-white">Mentions légales</a> </li>
        </ul>

    </footer>
</body>
</html>