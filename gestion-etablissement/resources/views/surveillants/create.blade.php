@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Ajouter un Surveillant</h3>

        <form action="{{ route('surveillants.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection