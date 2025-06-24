{{-- resources/views/gebruikers/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Gebruikers</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('gebruikers.create') }}" class="btn btn-primary">Gebruiker toevoegen</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Aangemaakt op</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gebruikers as $gebruiker)
                <tr>
                    <td>{{ $gebruiker->id }}</td>
                    <td>{{ $gebruiker->username }}</td>
                    <td>{{ $gebruiker->created_at }}</td>
                    <td>
                        <a href="{{ route('gebruikers.edit', $gebruiker) }}" class="btn btn-warning btn-sm">Bewerk</a>
                        <form action="{{ route('gebruikers.destroy', $gebruiker) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
