@extends('layouts.layout_emp')

@section('content-emp')
<h2>Create Product</h2>
<div class="container">
    <form action="{{ route('employee.store_product') }}" method="POST">
        @csrf
        <input type="hidden" name="id_demande" value="{{ $demand->id_demande }}">

        <div class="mb-3">
            <label for="id_carte" class="form-label">Card:</label>
            <select class="form-select" id="id_carte" name="id_carte" required>
                <!-- Populate with cartes -->
                @foreach($cartes as $carte)
                    <option value="{{ $carte->id_carte }}">{{ $carte->libelle }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_compte" class="form-label">Account:</label>
            <select class="form-select" id="id_compte" name="id_compte" required>
                <!-- Populate with comptes -->
                @foreach($comptes as $compte)
                    <option value="{{ $compte->id_cmpt }}">{{ $compte->classeLibelle() }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date_expiration" class="form-label">Expiration Date:</label>
            <input type="date" class="form-control" id="date_expiration" name="date_expiration" required>
        </div>

        <div class="mb-3">
            <label for="numero_carte" class="form-label">Card Number:</label>
            <input type="text" class="form-control" id="numero_carte" name="numero_carte" maxlength="16" required>
        </div>

        <div class="mb-3">
            <label for="cvv2" class="form-label">CVV2:</label>
            <input type="text" class="form-control" id="cvv2" name="cvv2" maxlength="3" required>
        </div>

        <div class="mb-3">
            <label for="code_pin" class="form-label">PIN Code:</label>
            <input type="text" class="form-control" id="code_pin" name="code_pin" maxlength="4" required>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Status:</label>
            <select class="form-select" id="statut" name="statut" required>
                <option value="valide">Valid</option>
                <option value="expiré">Expired</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection
