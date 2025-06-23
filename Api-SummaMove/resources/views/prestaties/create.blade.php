@extends('layouts.app')

@section('title', 'Nieuwe Prestatie')

@section('content')
    <h1>Nieuwe Prestatie Toevoegen</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestaties.store') }}" method="POST">
        @csrf

        <label>Gebruiker:</label><br />
        <select name="user_id" required>
            <option value="">-- Kies gebruiker --</option>
            @foreach($gebruikers as $gebruiker)
                <option value="{{ $gebruiker->id }}" {{ old('user_id') == $gebruiker->id ? 'selected' : '' }}>
                    {{ $gebruiker->name }}
                </option>
            @endforeach
        </select><br /><br />

        <label>Oefening:</label><br />
        <select name="oefening_id" required>
            <option value="">-- Kies oefening --</option>
            @foreach($oefeningen as $oefening)
                <option value="{{ $oefening->id }}" {{ old('oefening_id') == $oefening->id ? 'selected' : '' }}>
                    {{ $oefening->naam }}
                </option>
            @endforeach
        </select><br /><br />

        <label>Score:</label><br />
        <input type="number" name="score" min="0" value="{{ old('score') }}" required /><br /><br />

        <button type="submit" class="btn">Opslaan</button>
    </form>
@endsection
