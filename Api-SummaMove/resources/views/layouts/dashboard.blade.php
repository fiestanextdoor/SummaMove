<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body { font-family: sans-serif; margin: 20px; }
        nav { margin-bottom: 20px; }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #1f2937;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('dashboard.gebruikers') }}">Gebruikers</a>
        <a href="{{ route('dashboard.oefeningen') }}">Oefeningen</a>
        <a href="{{ route('dashboard.prestaties') }}">Prestaties</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
