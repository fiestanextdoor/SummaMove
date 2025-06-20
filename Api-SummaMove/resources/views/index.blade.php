@extends('layouts.app')

@section('content')
    <h1>Oefeningen</h1>
    <ul>
    @foreach ($oefeningen as $oefening)
        <li>
            <a href="{{ route('oefeningen.show', $oefening->id) }}">
                {{ $oefening->naam }}
            </a>
        </li>
    @endforeach
    </ul>
@endsection
