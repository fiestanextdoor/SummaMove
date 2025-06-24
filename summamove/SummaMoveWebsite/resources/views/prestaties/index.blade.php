@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prestaties</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('prestaties.create') }}" class="btn btn-primary mb-3">+ Nieuwe Prestatie</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gebruiker ID</th>
                <th>Oefening ID</th>
                <th>aantal</th>
                <th>Datum</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prestaties as $prestatie)
                <tr>
                    <td>{{ $prestatie->id }}</td>
                    <td>{{ $prestatie->gebruiker_id }}</td>
                    <td>{{ $prestatie->oefening_id }}</td>
                    <td>{{ $prestatie->aantal }}</td>
                    <td>{{ $prestatie->datum }}</td>
                    <td>
                        <a href="{{ route('prestaties.edit', $prestatie) }}" class="btn btn-warning btn-sm">Bewerk</a>
                        <form action="{{ route('prestaties.destroy', $prestatie) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze prestatie wilt verwijderen?')">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Geen prestaties gevonden.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
