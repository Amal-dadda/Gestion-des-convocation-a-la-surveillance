@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter un examen pour la filière : {{ $filiere->nom }}</h2>

        <form action="{{ route('examens.store') }}" method="POST">
            @csrf
            <input type="hidden" name="filiere_id" value="{{ $filiere->id }}">

            <div class="mb-3">
                <label>Module</label>
                <input type="text" name="module" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Heure</label>
                <input type="time" name="heure" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Durée (en minutes)</label>
                <input type="number" name="duree" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Salle</label>
                <input type="text" name="salle" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{ route('filieres.examens', $filiere->id) }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection