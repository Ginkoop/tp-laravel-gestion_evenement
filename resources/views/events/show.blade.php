@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="card shadow-sm p-4">
        <h1 class="mb-3">{{ $event->title }}</h1>
        <p class="text-muted">📅 {{ $event->date }} | 📍 {{ $event->location }}</p>
        <p>{{ $event->description }}</p>

        <form action="{{ route('events.register', $event) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">S'inscrire à cet événement</button>
        </form>
    </div>
@endsection
