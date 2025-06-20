@extends('layouts.app')

@section('content')
    <h1>{{ $oefening->naam }}</h1>
    <p>{{ $oefening->beschrijving }}</p>
    @if($oefening->foto)
        <img src="{{ asset('storage/' . $oefening->foto) }}" alt="Foto van {{ $oefening->naam }}" style="max-width:300px;">
    @endif
    <a href="{{ route('oefeningen.index') }}">Terug naar lijst</a>
@endsection
