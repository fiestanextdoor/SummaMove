@extends('layouts.app')

@section('title', 'Oefeningen')

@section('content')
    <h1>Oefeningen</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('oefeningen.create') }}" class="btn">Nieuwe Oefening</a>

    @if($oefeningen->isEmpty())
        <p>Geen oefeningen gevonden.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($oefeningen as $key => $oefening)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $oefening->naam }}</td>
                        <td>{{ $oefening->beschrijving ?? 'Geen beschrijving beschikbaar' }}</td>
                        <td>
                            <a href="{{ route('oefeningen.edit', $oefening) }}" class="btn btn-warning">Bewerken</a>

                            <form action="{{ route('oefeningen.destroy', $oefening) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Weet je zeker dat je deze oefening wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
