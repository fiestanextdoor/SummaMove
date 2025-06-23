@extends('layouts.app')
@section('title','Bewerk Oefening')
@section('content')
<h1>Bewerk Oefening</h1>
<form method="POST" action="{{ route('dashboard.oefeningen.update',$oefening) }}">
    @csrf @method('PUT')
    <div><label>Naam</label><br><input name="naam" value="{{ old('naam',$oefening->naam) }}"></div>
    @error('naam')<div style="color:red">{{ $message }}</div>@enderror
    <div><label>Beschrijving</label><br><textarea name="beschrijving">{{ old('beschrijving',$oefening->beschrijving) }}</textarea></div>
    <button type="submit" class="btn">Bijwerken</button>
</form>
@endsection
