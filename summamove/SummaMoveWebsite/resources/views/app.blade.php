<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'SummaMove')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <div>
            <a href="{{ route('dashboard') }}" class="font-bold mr-4">Dashboard</a>
            <a href="{{ route('users.index') }}" class="mr-4">Gebruikers</a>
            <a href="{{ route('exercises.index') }}" class="mr-4">Oefeningen</a>
            <a href="{{ route('performances.index') }}" class="mr-4">Prestaties</a>
        </div>
        <div>
            <span>{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="ml-2 underline">Uitloggen</button>
            </form>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-300 text-green-900 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
