@extends('layouts.app')

@section('title', 'Liste des Événements')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>📅 Tous les événements</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary">➕ Créer un événement</a>
    </div>

    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <p><strong>📍 Lieu :</strong> {{ $event->location }}</p>
                        <p><strong>📅 Date :</strong> {{ date('d/m/Y H:i', strtotime($event->date)) }}</p>

                        <a href="{{ route('events.show', $event) }}" class="btn btn-info">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
