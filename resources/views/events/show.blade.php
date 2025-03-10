@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="card shadow-sm p-4">
        <h1 class="mb-3">{{ $event->title }}</h1>
        <p class="text-muted">📅 {{ date('d/m/Y H:i', strtotime($event->date)) }} | 📍 {{ $event->location }}</p>
        <p>{{ $event->description }}</p>
        <h3 class="mt-4">👥 Participants :</h3>
        @if ($event->participants->count() > 0)
            <ul class="list-group">
                @foreach ($event->participants as $participant)
                    <li class="list-group-item">{{ $participant->name }}</li>
                @endforeach
            </ul>
        @else
            <p>Aucun participant pour le moment.</p>
        @endif


    @auth
            @if ($isRegistered)
                <div class="alert alert-success">✅ Vous êtes déjà inscrit à cet événement.</div>
            @else
                <form action="{{ route('events.register', $event) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">S'inscrire à cet événement</button>
                </form>
            @endif
        @else
            <p><a href="{{ route('login') }}" class="btn btn-warning">Connectez-vous pour vous inscrire</a></p>
        @endauth
    </div>
@endsection
