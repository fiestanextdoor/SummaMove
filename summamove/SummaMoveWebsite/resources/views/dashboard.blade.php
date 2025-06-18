@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-3 gap-6">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold">Gebruikers</h2>
        <p class="text-4xl">{{ $user_count }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold">Oefeningen</h2>
        <p class="text-4xl">{{ $exercise_count }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold">Prestaties</h2>
        <p class="text-4xl">{{ $performance_count }}</p>
    </div>
</div>
@endsection
