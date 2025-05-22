@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier l’examen : {{ $examen->module }}</h2>

        <form action="{{ route('examens.update', $examen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Module</label>
                <input type="text" name="module" class="form-control" value="{{ $examen->module }}" required>
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ $examen->date }}" required>
            </div>

            <div class="mb-3">
                <label>Heure</label>
                <input type="time" name="heure" class="form-control" value="{{ $examen->heure }}" required>
            </div>

            <div class="mb-3">
                <label>Durée (en minutes)</label>
                <input type="number" name="duree" class="form-control" value="{{ $examen->duree }}" required>
            </div>

            <div class="mb-3">
                <label>Salle</label>
                <input type="text" name="salle" class="form-control" value="{{ $examen->salle }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('filieres.examens', $examen->filiere_id) }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection