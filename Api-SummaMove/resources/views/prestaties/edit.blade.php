@extends('layouts.app')

@section('title', 'Bewerk Prestatie')

@section('content')
    <h1>Prestatie Bewerken</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestaties.update', $prestatie) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Gebruiker:</label><br />
        <select name="user_id" required>
            @foreach($gebruikers as $gebruiker)
                <option value="{{ $gebruiker->id }}" {{ (old('user_id', $prestatie->user_id) == $gebruiker->id) ? 'selected' : '' }}>
                    {{ $gebruiker->name }}
                </option>
            @endforeach
        </select><br /><br />

        <label>Oefening:</label><br />
        <select name="oefening_id" required>
            @foreach($oefeningen as $oefening)
                <option value="{{ $oefening->id }}" {{ (old('oefening_id', $prestatie->oefening_id) == $oefening->id) ? 'selected' : '' }}>
                    {{ $oefening->naam }}
                </option>
            @endforeach
        </select><br /><br />

        <label>Score:</label><br />
        <input type="number" name="score" min="0" value="{{ old('score', $prestatie->score) }}" required /><br /><br />

        <button type="submit" class="btn">Opslaan</button>
    </form>
@endsection
