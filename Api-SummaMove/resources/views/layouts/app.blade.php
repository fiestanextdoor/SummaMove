<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'SummaMove')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav a { margin-right: 10px; }
        .btn { padding: 5px 10px; background-color: #4caf50; color: white; text-decoration: none; border-radius: 3px; }
        .btn-danger { background-color: #f44336; }
        .btn-warning { background-color: #ff9800; }
        .alert-success { color: green; margin-bottom: 10px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px;}
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;}
    </style>
</head>
<body>
    <nav>
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('oefeningen.index') }}">Oefeningen</a>
            <a href="{{ route('prestaties.index') }}">Prestaties</a>
            <a href="{{ route('gebruikers.index') }}">Gebruikers</a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('register') }}">Registreren</a>
        @endauth
    </nav>

    <hr />

    @yield('content')
</body>
</html>
