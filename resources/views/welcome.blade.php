<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Henning.PARTY</title>

    </head>
    <body class="antialiased">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @auth
        <h1>Hello, {{ Auth::user()->name }}</h1>

        <a href="/logout">Logout</a>

    @endauth
    @guest
        <h1>Hello, Guest</h1>

        <form action="/login" method="POST">
            @csrf
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>

        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
            <button type="submit">Register</button>
        </form>
    @endguest

    </body>
</html>
