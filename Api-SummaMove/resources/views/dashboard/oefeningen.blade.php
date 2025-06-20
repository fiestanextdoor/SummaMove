@extends('layouts.app')

@section('title', 'Oefeningen')

@section('content')
    <h2>Oefeningen</h2>
    <ul>
        @foreach($oefeningen as $oefening)
            <li>{{ $oefeningen->naam }} - {{ $oefeningen->beschrijving }}</li>
        @endforeach
    </ul>
@endsection
