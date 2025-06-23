@extends('layouts.app')

@section('title', 'Bewerk Oefening')

@section('content')
    <h1>Oefening Bewerken</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('oefeningen.update', $oefening) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Naam:</label><br />
        <input type="text" name="naam" value="{{ old('naam', $oefening->naam) }}" required /><br /><br />

        <label>Beschrijving:</label><br />
        <textarea name="beschrijving">{{ old('beschrijving', $oefening->beschrijving) }}</textarea><br /><br />

        <button type="submit" class="btn">Opslaan</button>
    </form>
@endsection
