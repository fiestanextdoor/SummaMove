@extends('layouts.app')
@section('title','Oefeningen')
@section('content')
<h1>Oefeningen</h1>
@if(session('success'))<div class="alert-success">{{ session('success') }}</div>@endif
<a href="{{ route('dashboard.oefeningen.create') }}" class="btn">Nieuwe Oefening</a>
@if($oefeningen->isEmpty())
    <p>Geen oefeningen gevonden.</p>
@else
<table>
    <thead><tr><th>#</th><th>Naam</th><th>Beschrijving</th><th>Acties</th></tr></thead>
    <tbody>
        @foreach($oefeningen as $i => $oef)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $oef->naam }}</td>
                <td>{{ $oef->beschrijving ?? 'Geen beschrijving' }}</td>
                <td>
                    <a href="{{ route('dashboard.oefeningen.edit',$oef) }}" class="btn">Bewerken</a>
                    <form action="{{ route('dashboard.oefeningen.destroy',$oef) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Weet je het zeker?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
