@extends('layouts.layout_emp')

@section('title', 'Clients')

@section('content-emp')
    <h1>Clients</h1>

    <div class="mb-3">
        <a href="{{ route('employee.add_client') }}" class="btn btn-primary">Add Client</a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Numéro de téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->num_tlf }}</td>
                    <td>{{ $client->adresse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
