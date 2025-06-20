@extends('layouts.dashboard')

@section('content')
    <h2>Prestaties</h2>
    <table>
        <tr>
            <th>Gebruiker</th>
            <th>Oefening</th>
            <th>Datum</th>
            <th>Aantal</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
        </tr>
        @foreach ($prestaties as $prestatie)
        <tr>
            <td>{{ $prestatie->user->name ?? 'Onbekend' }}</td>
            <td>{{ $prestatie->oefening->naam ?? 'Onbekend' }}</td>
            <td>{{ $prestatie->datum }}</td>
            <td>{{ $prestatie->aantal }}</td>
            <td>{{ $prestatie->starttijd }}</td>
            <td>{{ $prestatie->eindtijd }}</td>
        </tr>
        @endforeach
    </table>
@endsection
