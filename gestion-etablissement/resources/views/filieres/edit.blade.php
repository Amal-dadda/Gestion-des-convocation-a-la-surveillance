@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier la Filière</h2>
        <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nom</label>

                <select class="form-control" name="nom" value="{{ $filiere->nom }}" required>
                    <option value=""> (Selectioner une filiére) </option>
                    <option value="CP-1">Année Préparatoire 1</option>
                    <option value="CP-2">Année Préparatoire 2</option>
                    <option value="TDIA-1">Transformation Digitale et Intelligence Artificielle 1</option>
                    <option value="TDIA-2">Transformation Digitale et Intelligence Artificielle 2</option>
                    <option value="GI-1">Génie Informatique 1</option>
                    <option value="GI-2">Génie Informatique 2</option>
                    <option value="GI-3">Génie Informatique 3</option>
                    <option value="ID-1">Ingénierie des données 1</option>
                    <option value="ID-2">Ingénierie des données 2</option>
                    <option value="ID-3">Ingénierie des données 3</option>
                    <option value="GC-1">Génie Civil 1</option>
                    <option value="GC-2">Génie Civil 2</option>
                    <option value="GC-3">Génie Civil 3</option>
                    <option value="GEER-1">Génie énergétique et énergies renouvelables 1</option>
                    <option value="GEER-2">Génie énergétique et énergies renouvelables 2</option>
                    <option value="GEER-3">Génie énergétique et énergies renouvelables 3</option>
                    <option value="GEE-1">Génie de Eau et Environnement 1</option>
                    <option value="GEE-2">Génie de Eau et Environnement 2</option>
                    <option value="GEE-3">Génie de Eau et Environnement 3</option>
                    <option value="GM-1">Génie Mécanique1</option>
                    <option value="GM-2">Génie Mécanique 2</option>
                    <option value="GM-3">Génie Mécanique 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Niveau</label>

                <select class="form-control" name="niveau" value="{{ $filiere->niveau }}" required>
                    <option value="">(Selectioner le niveau)</option>
                    <option value="1">1er année</option>
                    <option value="2">2éme année</option>
                    <option value="3">3éme année</option>
                    <option value="4">4éme année</option>
                    <option value="5">5éme année</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('filieres.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection