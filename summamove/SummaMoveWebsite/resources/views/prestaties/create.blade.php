@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe Prestatie</h1>
    <form method="POST" action="{{ route('prestaties.store') }}">
        @csrf
        <div class="form-group">
            <label>Gebruiker</label>
            <select name="gebruiker_id" class="form-control" required>
                <option value="">-- selecteer --</option>
                @foreach($gebruikers as $g)
                    <option value="{{ $g->id }}" {{ old('gebruiker_id') == $g->id ? 'selected' : '' }}>{{ $g->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label>Oefening</label>
            <select name="oefening_id" class="form-control" required>
                <option value="">-- selecteer --</option>
                @foreach($oefeningen as $o)
                    <option value="{{ $o->id }}" {{ old('oefening_id') == $o->id ? 'selected' : '' }}>{{ $o->naam }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label>Aantal</label>
            <input name="aantal" type="number" class="form-control" value="{{ old('aantal') }}" required>
        </div>
        <div class="form-group mt-2">
            <label>Datum</label>
            <input name="datum" type="date" class="form-control" value="{{ old('datum') }}" required>
        </div>
        <div class="form-group mt-2">
            <label>Starttijd</label>
            <input name="starttijd" type="time" class="form-control" value="{{ old('starttijd') }}" required>
        </div>
        <div class="form-group mt-2">
            <label>Eindtijd</label>
            <input name="eindtijd" type="time" class="form-control" value="{{ old('eindtijd') }}" required>
        </div>
        <button class="btn btn-primary mt-3">Opslaan</button>
    </form>
</div>
@endsection
