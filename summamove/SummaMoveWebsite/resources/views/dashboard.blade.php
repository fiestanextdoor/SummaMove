@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Welkom, {{ auth()->user()->username }}</h1>
    <p>Gebruik het menu om de applicatie te beheren.</p>
</div>
@endsection
