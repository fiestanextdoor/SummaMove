@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bewerk Prestatie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('prestaties.update', $prestatie) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="gebruiker_id" class="form-label">Gebruiker</label>
            <select name="gebruiker_id" id="gebruiker_id" class="form-control" required>
                @foreach ($gebruikers as $g)
                    <option value="{{ $g->id }}" {{ old('gebruiker_id', $prestatie->gebruiker_id) == $g->id ? 'selected' : '' }}>{{ $g->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="oefening_id" class="form-label">Oefening</label>
            <select name="oefening_id" id="oefening_id" class="form-control" required>
                @foreach ($oefeningen as $o)
                    <option value="{{ $o->id }}" {{ old('oefening_id', $prestatie->oefening_id) == $o->id ? 'selected' : '' }}>{{ $o->naam }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="aantal" class="form-label">Aantal</label>
            <input type="number" name="aantal" id="aantal" class="form-control" value="{{ old('aantal', $prestatie->aantal) }}" required>
        </div>

        <div class="mb-3">
            <label for="datum" class="form-label">Datum</label>
            <input type="date" name="datum" id="datum" class="form-control" value="{{ old('datum', $prestatie->datum) }}" required>
        </div>

        <div class="mb-3">
            <label for="starttijd" class="form-label">Starttijd</label>
            <input type="time" name="starttijd" id="starttijd" class="form-control" value="{{ old('starttijd', $prestatie->starttijd) }}" required>
        </div>

        <div class="mb-3">
            <label for="eindtijd" class="form-label">Eindtijd</label>
            <input type="time" name="eindtijd" id="eindtijd" class="form-control" value="{{ old('eindtijd', $prestatie->eindtijd) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Bijwerken</button>
        <a href="{{ route('prestaties.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
