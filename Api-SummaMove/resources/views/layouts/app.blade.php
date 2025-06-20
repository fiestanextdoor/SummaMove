<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="{{ route('dashboard') }}">SummaMove</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.gebruikers') }}">Gebruikers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.oefeningen') }}">Oefeningen</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.prestaties') }}">Prestaties</a></li>
            </ul>

            <!-- ✅ Uitlogknop -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Uitloggen</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
