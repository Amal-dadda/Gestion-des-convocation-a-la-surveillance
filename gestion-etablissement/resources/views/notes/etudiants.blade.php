@extends('layouts.app')

@section('content')
    <h2>Étudiants de {{ $filiere->nom }}</h2>
    <ul>
        @foreach($etudiants as $etudiant)
            <li>
                {{ $etudiant->prenom }} {{ $etudiant->nom }}
                <a href="{{ route('notes.show', $etudiant->id) }}">Gérer les notes</a>
            </li>
        @endforeach
    </ul>
@endsection