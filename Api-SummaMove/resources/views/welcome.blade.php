@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Welkom bij SummaMove!</h1>
        <p class="mt-3">Log in of registreer om verder te gaan.</p>
        <a href="{{ route('login') }}" class="btn btn-primary m-2">Inloggen</a>
        <a href="{{ route('register') }}" class="btn btn-secondary m-2">Registreren</a>
    </div>
@endsection
