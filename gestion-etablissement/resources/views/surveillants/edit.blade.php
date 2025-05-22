@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier le surveillant</h2>

        <form action="{{ route('surveillants.update', $surveillant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ $surveillant->nom }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $surveillant->email }}" class="form-control" required>
            </div>
            <button class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection