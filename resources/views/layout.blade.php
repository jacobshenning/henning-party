<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Henning.PARTY</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ Auth::user()->api_token }}">
    @endauth

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">

<header class="shadow bg-white">
    <div class="mx-auto max-w-7xl flex items-center py-2">
        <a href="/" class="text-indigo-600 flex items-center py-2 hover:opacity-75 duration-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 pr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
            </svg>
            <h1 class="font-black text-xl">
                Henning.PARTY
            </h1>
        </a>

        <div class="ml-auto">
            @auth
                <a href="{{ route('auth.logout') }}">Logout</a>
            @endauth

            @guest
                <a href="{{ route('auth.login') }}">Login</a>
            @endguest
        </div>
    </div>
</header>

<main class="mx-auto max-w-7xl py-3 px-3">
    @yield('main')
</main>


</body>
</html>
