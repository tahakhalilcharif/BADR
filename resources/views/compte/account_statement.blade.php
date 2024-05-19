@extends('layouts.layout_home')
@section('head')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/statement.css') }}">
@endsection

@section('title', 'Account Statement')


@section('content')
<div class="container-statement">
    <h2 class="section-title">Account Statement for Account: {{ $compte->num_cmt }}</h2>

    @if ($transactions->isEmpty())
        <p class="empty-message">No transactions found for this account.</p>
        <img src="{{ asset('images/icone6.png') }}" class="centered-image">
    @else
        <table class="styled-table">
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
</div>


@endsection
