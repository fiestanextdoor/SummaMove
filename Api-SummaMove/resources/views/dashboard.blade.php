<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-2xl mb-4 font-bold">Welkom op het Dashboard</h1>

            <ul class="list-disc pl-6 space-y-2 text-blue-600">
                <li><a href="{{ route('dashboard.gebruikers') }}" class="hover:underline">📋 Gebruikers overzicht</a></li>
                <li><a href="{{ route('dashboard.oefeningen') }}" class="hover:underline">🏋️‍♂️ Oefeningen overzicht</a></li>
                <li><a href="{{ route('dashboard.prestaties') }}" class="hover:underline">📈 Prestaties overzicht</a></li>
            </ul>
        </div>
    </div>
</x-app-layout>

