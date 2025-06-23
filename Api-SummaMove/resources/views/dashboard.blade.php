@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Welkom op het dashboard</h1>

    <p>Je bent ingelogd als: {{ auth()->user()->email }}</p>

    <nav>
        <ul>
            <li><a href="{{ route('oefeningen.index') }}">Oefeningen</a></li>
            <li><a href="{{ route('prestaties.index') }}">Prestaties</a></li>
            <li><a href="{{ route('gebruikers.index') }}">Gebruikers</a></li>
        </ul>
    </nav>
@endsection
