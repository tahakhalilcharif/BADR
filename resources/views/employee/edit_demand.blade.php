@extends('layouts.layout_emp')

@section('content-emp')
<h2>Edit Demand</h2>
<div class="container">
    <form action="{{ route('employee.update_demand', ['id' => $demand->id_demande]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="statut" class="form-label">Status:</label>
            <select class="form-select" id="statut" name="statut" required>
                <option value="Pending" {{ old('statut', $demand->statut) == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ old('statut', $demand->statut) == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Rejected" {{ old('statut', $demand->statut) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <!-- Add other fields as necessary -->

        <button type="submit" class="btn btn-primary">Update Demand</button>
    </form>
</div>
@endsection
