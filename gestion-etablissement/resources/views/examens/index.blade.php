@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Examens - {{ $filiere->nom }}</h2>

        <a href="{{ route('examens.create', $filiere->id) }}" class="btn btn-primary mb-3">Ajouter un Examen</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Module</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Durée</th>
                    <th>Salle</th>
                    <th>Date modification</th>
                    <th>Surveillants</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filiere->examens as $examen)
                    <tr>
                        <td>{{ $examen->module }}</td>
                        <td>{{ $examen->date }}</td>
                        <td>{{ $examen->heure }}</td>
                        <td>{{ $examen->duree }} min</td>
                        <td>{{ $examen->salle }}</td>
                        <td>{{ $examen->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @forelse($examen->surveillants as $s)
                                <span class="badge bg-success">{{ $s->nom }}</span>
                            @empty
                                <span class="text-danger">---</span>
                            @endforelse
                        </td>
                        <td>
                            <a href="{{ route('examens.edit', $examen->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                            <form action="{{ route('examens.destroy', $examen->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>


                            {{-- //// --}}

                            <a href="{{ route('examens.surveillants', $examen->id) }}" class="btn btn-outline-primary">
                                Gérer Surveillants
                            </a>




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection