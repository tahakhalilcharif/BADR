@extends('layouts.layout_home')

@section('title', 'Account Statement')

@section('content')
    <h2>Account Statement for Account: {{ $compte->num_cmt }}</h2>

    @if ($transactions->isEmpty())
        <p>No transactions found for this account.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Account number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->trn_ref_no }}</td>
                        <td>{{ $transaction->date_trn }}</td>
                        <td>{{ $transaction->montant }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->id_compte_destination }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
