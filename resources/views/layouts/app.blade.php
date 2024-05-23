<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>
<body>
    <header class="d-flex justify-content-between p-3 mb-4 border-bottom">
        <div class="fs-4 text-uppercase">comics db</div>
        <ul class="nav">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ route('comics.index')}}" class="nav-link">Vedi i Fumetti</a></li>
            <li class="nav-item"><a href="{{ route('comics.create') }}" class="nav-link">Aggiungi un Fumetto</a></li>
        </ul>
    </header>

    <main>
        <section>
            <div class="container">
                @yield('content')
            </div>
        </section>
    </main>
</body>
