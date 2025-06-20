@extends('layouts.dashboard')

@section('content')
    <h2>Gebruikers</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Naam</th>
        </tr>
        @foreach ($gebruikers as $gebruiker)
        <tr>
            <td>{{ $gebruiker->id }}</td>
            <td>{{ $gebruiker->name }}</td>
        </tr>
        @endforeach
    </table>
@endsection
