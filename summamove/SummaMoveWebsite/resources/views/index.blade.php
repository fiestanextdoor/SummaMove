@extends('layouts.app')

@section('title', 'Gebruikers')

@section('content')
<h1 class="text-3xl font-bold mb-6">Gebruikers</h1>

<a href="{{ route('users.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nieuwe gebruiker</a>

<table class="table-auto w-full bg-white rounded shadow">
    <thead>
        <tr>
            <th class="border px-4 py-2">Naam</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Rol</th>
            <th class="border px-4 py-2">Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email }}</td>
            <td class="border px-4 py-2">{{ $user->role }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:underline mr-2">Bewerken</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Weet je het zeker?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
