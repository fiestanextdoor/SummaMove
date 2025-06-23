@extends('layouts.app')
@section('title','Prestaties')
@section('content')
<h2>Prestaties</h2>
<table>
    <thead>
        <tr><th>Gebruiker</th><th>Oefening</th><th>Datum</th><th>Starttijd</th><th>Eindtijd</th><th>Aantal</th></tr>
    </thead>
    <tbody>
        @foreach($prestaties as $prestatie)
            <tr>
                <td>{{ $prestatie->gebruiker->name }}</td>
                <td>{{ $prestatie->oefening->naam }}</td>
                <td>{{ $prestatie->datum }}</td>
                <td>{{ $prestatie->starttijd }}</td>
                <td>{{ $prestatie->eindtijd }}</td>
                <td>{{ $prestatie->aantal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
