@extends('layouts.app')

@section('title', 'Nieuwe Oefening')

@section('content')
    <h1>Nieuwe Oefening Toevoegen</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('oefeningen.store') }}" method="POST">
        @csrf
        <label>Naam:</label><br />
        <input type="text" name="naam" value="{{ old('naam') }}" required /><br /><br />

        <label>Beschrijving:</label><br />
        <textarea name="beschrijving">{{ old('beschrijving') }}</textarea><br /><br />

        <button type="submit" class="btn">Opslaan</button>
    </form>
@endsection
