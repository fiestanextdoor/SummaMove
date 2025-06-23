@extends('layouts.app')

@section('title', 'Oefeningen')

@section('content')
    <h1>Oefeningen</h1>

    <a href="{{ route('oefeningen.create') }}" class="btn">Nieuwe oefening toevoegen</a>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($oefeningen as $oefening)
                <tr>
                    <td>{{ $oefening->naam }}</td>
                    <td>{{ $oefening->omschrijving }}</td>
                    <td>
                        <a href="{{ route('oefeningen.edit', $oefening) }}" class="btn btn-warning">Bewerken</a>

                        <form action="{{ route('oefeningen.destroy', $oefening) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je het zeker?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
