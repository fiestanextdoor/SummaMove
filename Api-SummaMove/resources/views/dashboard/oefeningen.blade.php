@extends('layouts.dashboard')

@section('content')
    <h2>Oefeningen</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Beschrijving</th>
        </tr>
        @foreach ($oefeningen as $oefening)
        <tr>
            <td>{{ $oefening->id }}</td>
            <td>{{ $oefening->naam }}</td>
            <td>{{ $oefening->beschrijving }}</td>
        </tr>
        @endforeach
    </table>
@endsection
