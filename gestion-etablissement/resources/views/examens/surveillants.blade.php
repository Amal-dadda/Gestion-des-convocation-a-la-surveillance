@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Surveillants de l'examen : {{ $examen->module }} ({{ $examen->date }} à {{ $examen->heure }})</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($examen->surveillants as $surv)
                    <tr>
                        <td>{{ $surv->nom }}</td>
                        <td>{{ $surv->email }}</td>
                        <td>
                            <div class="d-flex flex-row align-items-center gap-2">

                                <form method="POST"
                                    action="{{ route('examens.surveillants.supprimer', [$examen->id, $surv->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Supprimer</button>

                                    <a href="#" class="btn btn-success btn-sm">Envoyer convocation</a>
                                </form>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Aucun surveillant affecté.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- ➕ --}}
        <hr>
        <h4> Les surveillants disponibles :</h4>
        <form method="POST" action="{{ route('examens.surveillants.ajouter', $examen->id) }}">
            @csrf
            <div class="form-group">
                <select name="surveillant_id" class="form-control" required>
                    <option value="">-- Choisir un surveillant disponible --</option>
                    @foreach($disponibles as $dispo)
                        <option value="{{ $dispo->id }}">{{ $dispo->nom }} - {{ $dispo->email }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mt-2">Ajouter</button>
        </form>
    </div>
@endsection