@extends('layouts.layout_emp')

@section('head')

<link rel="stylesheet" href="{{ asset('css/uniactivated_user.css') }}">

@endsection


@section('content-emp')
<h1 class="page-title">Accounts</h1>

@if ($accounts->isEmpty())
    <p class="empty-message">No accounts available.</p>
@else
    <table class="styled-table"> <!-- Utilisez la classe styled-table -->
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Account</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Date Opened</th>
                <th>Last Transaction</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->client ? $account->client->nom : 'N/A' }}</td>
                    <td>{{$account->classeLibelle()}}</td>
                    <td>{{ $account->num_cmt }}</td>
                    <td>{{ $account->solde }}</td>
                    <td>{{ $account->date_ouv }}</td>
                    <td>{{ $account->derniere_trn }}</td>
                    <td>{{ $account->statut }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


@endsection
