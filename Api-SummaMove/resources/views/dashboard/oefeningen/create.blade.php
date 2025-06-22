@extends('layouts.app')

@section('title', 'Nieuwe Oefening')

@section('content')
    <h1>Nieuwe Oefening toevoegen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.oefeningen.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="naam" class="form-label">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="{{ old('naam') }}" required>
        </div>

        <div class="mb-3">
            <label for="beschrijving" class="form-label">Beschrijving</label>
            <textarea class="form-control" id="beschrijving" name="beschrijving">{{ old('beschrijving') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Toevoegen</button>
        <a href="{{ route('dashboard.oefeningen.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
@endsection
