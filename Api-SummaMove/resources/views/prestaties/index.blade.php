@extends('layouts.app')

@section('title', 'Prestaties')

@section('content')
    <h1>Prestaties</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    

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
                    <td>{{ $prestatie->username?->name ?? 'Onbekende gebruiker' }}</td>
                    <td>{{ $prestatie->oefening?->naam ?? 'Onbekende oefening' }}</td>
                    <td>{{ $prestatie->aantal }}</td>
                    <td>
                        

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
 