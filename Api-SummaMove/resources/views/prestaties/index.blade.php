@extends('layouts.app')

@section('content')
    <h1>Prestaties van {{ auth()->user()->username }}</h1>

    <form method="GET" action="{{ route('prestaties.index') }}">
        <label>Sorteren op:</label>
        <select name="sort" onchange="this.form.submit()">
            <option value="">-- Kies --</option>
            <option value="datum" {{ request('sort') == 'datum' ? 'selected' : '' }}>Datum</option>
            <option value="oefening" {{ request('sort') == 'oefening' ? 'selected' : '' }}>Oefening</option>
        </select>
    </form>

    <table border="1" cellpadding="5" cellspacing="0" style="margin-top:10px;">
        <thead>
            <tr>
                <th>Datum</th>
                <th>Oefening</th>
                <th>Aantal keer</th>
                <th>Starttijd</th>
                <th>Eindtijd</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestaties as $prestatie)
                <tr>
                    <td>{{ $prestatie->datum->format('d-m-Y') }}</td>
                    <td>{{ $prestatie->oefening->naam ?? '-' }}</td>
                    <td>{{ $prestatie->aantal_keer }}</td>
                    <td>{{ $prestatie->starttijd }}</td>
                    <td>{{ $prestatie->eindtijd }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
