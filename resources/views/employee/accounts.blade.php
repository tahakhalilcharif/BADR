@extends('layouts.layout_emp')

@section('content-emp')
    <h1>Accounts</h1>
    @if ($accounts->isEmpty())
        <p>No accounts available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Client Name</th>
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
