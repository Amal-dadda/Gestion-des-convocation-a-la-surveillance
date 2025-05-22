@extends('layouts.app')

@section('content')
    <h2>Filières</h2>
    <ul>
        @foreach($filieres as $filiere)
            <li>
                {{ $filiere->nom }} - {{ $filiere->niveau }}
                <a href="{{ route('notes.etudiants', $filiere->id) }}">Voir étudiants</a>
            </li>
        @endforeach
    </ul>
@endsection