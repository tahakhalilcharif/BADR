@extends('layouts.layout_emp')

@section('head')
<link rel="stylesheet" href="{{ asset('css/uniactivated_user.css') }}">
@endsection


@section('content-emp')
<h1 class="section-title">Demands</h1>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Card</th>
            <th>Account</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($demands as $demand)
            <tr>
                <td>{{ $demand->id_demande }}</td>
                <td>{{ $demand->client->nom }} {{ $demand->client->prenom }}</td>
                <td>{{ $demand->carte->libelle }}</td>
                <td>{{ $demand->compte->classeLibelle() }}</td>
                <td>{{ $demand->date_demande }}</td>
                <td>{{ $demand->statut }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
