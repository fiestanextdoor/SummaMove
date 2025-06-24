@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Oefening bewerken</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('oefeningen.update', $oefening) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="naam" class="form-label">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="{{ old('naam', $oefening->naam) }}" required>
            @error('naam')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="beschrijving" class="form-label">Beschrijving</label>
            <textarea class="form-control" id="beschrijving" name="beschrijving" rows="4">{{ old('beschrijving', $oefening->beschrijving) }}</textarea>
            @error('beschrijving')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Bijwerken</button>
        <a href="{{ route('oefeningen.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection
