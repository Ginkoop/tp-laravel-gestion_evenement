@extends('layouts.app')

@section('title', 'Créer un Événement')

@section('content')
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Créer un nouvel événement</h2>

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre de l'événement</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="datetime-local" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Lieu</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Créer l'événement</button>
        </form>
    </div>
@endsection
