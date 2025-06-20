<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('dashboard.gebruikers') }}">Gebruikers</a> |
        <a href="{{ route('dashboard.oefeningen') }}">Oefeningen</a> |
        <a href="{{ route('dashboard.prestaties') }}">Prestaties</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
