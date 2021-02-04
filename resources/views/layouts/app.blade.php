<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>Document</title>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center text-lg font-semibold">
                <li class="p-2"><a href="{{ route('home') }}">Główna</a></li>
            </ul>
            <ul class="flex items-center text-lg font-semibold">
                @auth
                    <li class="p-2"><a href="{{ route('home') }}">{{ Auth::user()->name }}</a></li>
                    <li class="p-2"><a href="{{ route('dashboard') }}">Panel</a></li>
                    <li class="p-2">
                        <form action="{{ route('logout') }}" method="post" class="inline">
                            @csrf
                            <button class="text-lg font-semibold">
                                Wyloguj
                            </button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="p-2">
                        <a href="{{ route('login') }}">Logowanie</a>
                    </li>
                    <li class="p-2">
                        <a href="{{ route('register') }}">Rejestracja</a>
                    </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
