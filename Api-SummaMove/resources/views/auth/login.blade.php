<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label>Email:</label><br />
        <input type="email" name="email" value="{{ old('email') }}" required autofocus><br /><br />

        <label>Wachtwoord:</label><br />
        <input type="password" name="password" required><br /><br />

        <button type="submit">Inloggen</button>
    </form>

    <p>Nog geen account? <a href="{{ route('register') }}">Registreren</a></p>
</body>
</html>
