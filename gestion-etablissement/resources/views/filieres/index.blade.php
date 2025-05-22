@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 text-primary fw-bold mb-0">Liste des Filières</h2>
            <a href="{{ route('filieres.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Ajouter une Filière
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-4">Nom de la Filière</th>
                                <th class="py-3 px-4 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filieres as $filiere)
                                <tr>
                                    <td class="py-3 px-4 align-middle fw-semibold">
                                        {{ $filiere->nom }}
                                    </td>
                                    <td class="py-3 px-4 align-middle text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('filieres.edit', $filiere->id) }}"
                                                class="btn btn-sm btn-outline-primary" title="Modifier">
                                                <i class="bi bi-pencil">Modifier</i>
                                            </a>

                                            <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?')">
                                                    <i class="bi bi-trash">Supprimer</i>
                                                </button>
                                            </form>

                                            <a href="{{ route('filieres.planning', $filiere->id) }}"
                                                class="btn btn-sm btn-outline-success" title="Planning">
                                                <i class="bi bi-calendar-week">Voir Planning</i>
                                            </a>

                                            <a href="{{ route('filieres.examens', $filiere->id) }}"
                                                class="btn btn-sm btn-outline-warning" title="Examens">
                                                <i class="bi bi-journal-text">Voir examen</i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Succès</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <!-- Ajoutez ceci dans votre layout principal si ce n'est pas déjà fait -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection