@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe Oefening</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('oefeningen.store') }}">
        @csrf
        <div class="form-group">
            <label>Naam</label>
            <input type="text" name="naam" class="form-control" value="{{ old('naam') }}" required>
        </div>

        <div class="form-group mt-2">
            <label>Beschrijving</label>
            <textarea name="beschrijving" class="form-control">{{ old('beschrijving') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Opslaan</button>
        <a href="{{ route('oefeningen.index') }}" class="btn btn-secondary mt-3">Annuleren</a>
    </form>
</div>
@endsection
