@extends('layouts.layout_home')


@section('head')

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info_client.css') }}">
@endsection
@section('title', 'transaction')


@section('content')
    @auth

<div class="container-trn">
    @if($compte->solde > 1000)
    <h2>Transfer Money</h2>
    <form action="{{ route('compte.transfer_money') }}" method="POST">
        @csrf
        <input type="hidden" name="source_account_id" value="{{ $compte->id_cmpt }}">
        <label for="recipient_account_number">Recipient Account Number:</label>
        <input type="text" name="recipient_account_number" id="recipient_account_number" required>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" min="500" required>
        <button type="submit">Transfer</button>
    </form>
    @else
     <p> you don't have money </p>
    @endif

</div>

<div class="account-actions">
    <h2>Account Actions:</h2>
    <ul>
        <li><a  href="{{route('compte.transaction' , ['num_cmt' => $compte->num_cmt])}}">Transaction</a></li>
        <li><a href="{{ route('new_account_form') }}">Account statement</a></li>
       
    </ul>
</div>


@endauth

@endsection
