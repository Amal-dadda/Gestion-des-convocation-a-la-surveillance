@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Ajouter Surveillant à l’examen : {{ $examen->module }}</h3>

        <form method="POST" action="{{ route('examens.storeSurveillant', $examen->id) }}">
            @csrf

            <div class="mb-3">
                <label>Surveillants disponibles :</label>
                @foreach($surveillantsDisponibles as $surveillant)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="surveillant_ids[]" value="{{ $surveillant->id }}">
                        <label class="form-check-label">{{ $surveillant->nom }} ({{ $surveillant->email }})</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Affecter</button>
        </form>
    </div>
@endsection