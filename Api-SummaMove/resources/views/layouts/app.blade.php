<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard') - SummaMove</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px auto;
            max-width: 900px;
            background: #f9f9f9;
            color: #333;
        }
        header {
            margin-bottom: 20px;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
        }
        nav a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: white;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 3px;
        }
        form {
            display: inline;
        }
        button.btn-danger {
            background-color: #dc3545;
            border: none;
            cursor: pointer;
        }
        button.btn-danger:hover {
            background-color: #a71d2a;
        }
        h1, h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
        <a href="{{ route('dashboard.gebruikers') }}">Gebruikers</a>
        <a href="{{ route('dashboard.prestaties') }}">Prestaties</a>
        <a href="{{ route('dashboard.oefeningen.index') }}">Oefeningen</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger" style="margin-left: 20px;">Uitloggen</button>
        </form>
    </nav>
</header>

<main>
    @yield('content')
</main>
</body>
</html>
