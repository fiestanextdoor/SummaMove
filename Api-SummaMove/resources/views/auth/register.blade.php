@extends('layouts.app')

@section('title', 'Registreren')

@section('content')
    <h1>Registreren</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <label>Naam:</label><br />
        <input type="text" name="name" required value="{{ old('name') }}" /><br /><br />

        <label>Email:</label><br />
        <input type="email" name="email" required value="{{ old('email') }}" /><br /><br />

        <label>Wachtwoord:</label><br />
        <input type="password" name="password" required /><br /><br />

        <label>Bevestig wachtwoord:</label><br />
        <input type="password" name="password_confirmation" required /><br /><br />

        <button type="submit" class="btn">Registreren</button>
    </form>
@endsection
