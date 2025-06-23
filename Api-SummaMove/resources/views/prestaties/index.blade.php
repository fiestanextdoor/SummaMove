@extends('layouts.app')

@section('title', 'Prestaties')

@section('content')
    <h1>Prestaties</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('prestaties.create') }}" class="btn btn-primary">Nieuwe prestatie toevoegen</a>

    <table>
        <thead>
            <tr>
                <th>Gebruiker</th>
                <th>Oefening</th>
                <th>Score</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestaties as $prestatie)
                <tr>
                    <td>{{ $prestatie->gebruiker?->name ?? 'Onbekende gebruiker' }}</td>
                    <td>{{ $prestatie->oefening?->naam ?? 'Onbekende oefening' }}</td>
                    <td>{{ $prestatie->score }}</td>
                    <td>
                        <a href="{{ route('prestaties.edit', $prestatie) }}" class="btn btn-warning">Bewerk</a>

                        <form action="{{ route('prestaties.destroy', $prestatie) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Weet je het zeker?')">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
 