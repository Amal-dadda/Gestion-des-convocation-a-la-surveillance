@extends('layouts.app')


@section('content')
    <div class="container">
        <h3>Liste des enseignents a ENSAH:</h3>
        <a href="{{ route('surveillants.create') }}" class="btn btn-primary mb-2">Ajouter</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surveillants as $surveillant)
                    <tr>
                        <td>{{ $surveillant->nom }}</td>
                        <td>{{ $surveillant->email }}</td>
                        <td>
                            <form action="{{ route('surveillants.destroy', $surveillant->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection