<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
</head>
<body>
    <h1>Registreren</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label>Naam</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Wachtwoord</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Bevestig wachtwoord</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Registreren</button>
    </form>
</body>
</html>
