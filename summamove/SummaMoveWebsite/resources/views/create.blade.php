@extends('layouts.app')

@section('title', 'Nieuwe gebruiker')

@section('content')
<h1 class="text-3xl font-bold mb-6">Nieuwe gebruiker aanmaken</h1>

<form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
    @csrf

    <label class="block mb-2">
        Naam:
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" required>
    </label>

    <label class="block mb-2">
        Email:
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded" required>
    </label>

    <label class="block mb-2">
        Rol:
        <select name
