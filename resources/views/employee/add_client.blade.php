@extends('layouts.layout_emp')

@section('content-emp')
    <h1>Add Client</h1>
    <form action="{{ route('employee.store_client') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="num_tlf" class="form-label">Numéro de téléphone</label>
            <input type="text" class="form-control" id="num_tlf" name="num_tlf" required>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Client</button>
    </form>
@endsection
