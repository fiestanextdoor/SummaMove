@extends('layouts.app')

@section('title', 'Gebruikers')

@section('content')
    <h2>Gebruikers</h2>
    <ul>
        @foreach($gebruikers as $gebruiker)
            <li>{{ $gebruiker->name }} ({{ $gebruiker->email }})</li>
        @endforeach
    </ul>
@endsection
