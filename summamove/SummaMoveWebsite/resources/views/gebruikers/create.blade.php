{{-- resources/views/gebruikers/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gebruiker toevoegen</h1>

    <form action="{{ route('gebruikers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Gebruikersnaam</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-success">Opslaan</button>
        <a href="{{ route('gebruikers.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
