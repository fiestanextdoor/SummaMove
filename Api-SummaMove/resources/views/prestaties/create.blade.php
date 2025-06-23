@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Voeg prestatie toe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestaties.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Gebruiker</label>
            <select name="username" id="username" class="form-control" required>
                <option value="">-- Selecteer gebruiker --</option>
                @foreach ($gebruikers as $gebruiker)
                    <option value="{{ $gebruiker->username }}" {{ old('username') == $gebruiker->username ? 'selected' : '' }}>
                        {{ $gebruiker->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="oefening_id" class="form-label">Oefening</label>
            <select name="oefening_id" id="oefening_id" class="form-control" required>
                <option value="">-- Selecteer oefening --</option>
                @foreach ($oefeningen as $oefening)
                    <option value="{{ $oefening->id }}" {{ old('oefening_id') == $oefening->id ? 'selected' : '' }}>
                        {{ $oefening->naam }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="aantal" class="form-label">Aantal</label>
            <input type="number" name="aantal" id="aantal" value="{{ old('aantal') }}" class="form-control" required min="1" />
        </div>

        <div class="mb-3">
            <label for="datum" class="form-label">Datum</label>
            <input type="date" name="datum" id="datum" value="{{ old('datum') }}" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="starttijd" class="form-label">Starttijd</label>
            <input type="time" name="starttijd" id="starttijd" value="{{ old('starttijd') }}" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="eindtijd" class="form-label">Eindtijd</label>
            <input type="time" name="eindtijd" id="eindtijd" value="{{ old('eindtijd') }}" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
