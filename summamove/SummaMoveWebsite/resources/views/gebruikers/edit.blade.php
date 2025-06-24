{{-- resources/views/gebruikers/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gebruiker bewerken</h1>

    <form action="{{ route('gebruikers.update', $gebruiker) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">Gebruikersnaam</label>
            <input type="text" class="form-control" name="username" value="{{ old('username', $gebruiker->username) }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Nieuw wachtwoord (optioneel)</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
        <a href="{{ route('gebruikers.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
