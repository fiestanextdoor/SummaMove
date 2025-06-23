@extends('layouts.app')
@section('title','Nieuwe Oefening')
@section('content')
<h1>Nieuwe Oefening</h1>
<form method="POST" action="{{ route('dashboard.oefeningen.store') }}">
    @csrf
    <div><label>Naam</label><br><input name="naam" value="{{ old('naam') }}"></div>
    @error('naam')<div style="color:red">{{ $message }}</div>@enderror
    <div><label>Beschrijving</label><br><textarea name="beschrijving">{{ old('beschrijving') }}</textarea></div>
    <button type="submit" class="btn">Opslaan</button>
</form>
@endsection
