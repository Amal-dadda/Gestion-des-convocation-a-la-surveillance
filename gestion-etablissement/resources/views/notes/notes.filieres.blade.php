@extends('layouts.app')

@section('content')
    <h2>Notes de {{ $etudiant->prenom }} {{ $etudiant->nom }}</h2>

    <form action="{{ route('notes.store', $etudiant->id) }}" method="POST">
        @csrf
        <input type="text" name="module" placeholder="Module" required>
        <input type="number" step="0.1" name="note" placeholder="Note" required>
        <button type="submit">Ajouter</button>
    </form>

    <ul>
        @foreach($etudiant->notes as $note)
            <li>{{ $note->module }} : {{ $note->note }}
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection