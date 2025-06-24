@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Oefeningen</h1>
    <a href="{{ route('oefeningen.create') }}" class="btn btn-primary mb-3">+ Nieuwe Oefening</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($oefeningen as $oefening)
                <tr>
                    <td>{{ $oefening->id }}</td>
                    <td>{{ $oefening->naam }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($oefening->beschrijving, 50) }}</td>
                    <td>
                        <a href="{{ route('oefeningen.edit', $oefening) }}" class="btn btn-warning btn-sm">Bewerk</a>

                        <form method="POST" action="{{ route('oefeningen.destroy', $oefening) }}" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Weet je het zeker?')" class="btn btn-danger btn-sm">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Geen oefeningen gevonden</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
