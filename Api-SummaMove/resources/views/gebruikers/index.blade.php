@extends('layouts.app')

@section('title', 'Gebruikerslijst')

@section('content')
    <h1>Gebruikers</h1>
    @if($gebruikers->isEmpty())
        <p>Geen gebruikers gevonden.</p>
    @else
        <ul>
            @foreach ($gebruikers as $gebruiker)
                <li>{{ $gebruiker->username }}</li>
            @endforeach
        </ul>
    @endif
@endsection
