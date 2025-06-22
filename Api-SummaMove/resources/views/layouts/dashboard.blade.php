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
        form.logout-form {
            display: inline;
        }
        form.logout-form button {
            background: none;
            border: none;
            color: #1f2937;
            font-weight: bold;
            cursor: pointer;
            margin-left: 10px;
            padding: 0;
        }
        form.logout-form button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
        <a href="{{ route('dashboard.gebruikers') }}">Gebruikers</a>
        <a href="{{ route('dashboard.oefeningen.index') }}">Oefeningen</a>
        <a href="{{ route('dashboard.prestaties') }}">Prestaties</a>
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit">Uitloggen</button>
        </form>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
