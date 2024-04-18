@extends('layouts.layout_home')

@section('content')
    @auth
        @if($compte->statut === 'actif')
        <div class="container">
            <h1>Account Details</h1>
            <p>Account number : {{ $compte->num_cmt }}</p>
            <p>Current Balance : {{ $compte->solde }}</p>
            <p>Type : {{ $compte->classeLibelle()}}</p>
            @if ($compte->produits()->exists())
            <form action="{{ route('compte.show_products', ['id' => $compte->id_cmpt]) }}" method="GET">
                @csrf
                <button type="submit">View Products</button>
            </form>
            @endif
        </div>
        @else
            <h1>Please Activate Your Account.</h1>
        @endif

        
        @if($compte->solde > 1000)
        <h2>Transfer Money</h2>
        <form action="{{ route('compte.transfer_money') }}" method="POST">
            @csrf
            <input type="hidden" name="source_account_id" value="{{ $compte->id_cmpt }}">
            <label for="recipient_account_number">Recipient Account Number:</label>
            <input type="text" name="recipient_account_number" required>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" min="500" required>
            <button type="submit">Transfer</button>
        </form>
        @endif
    @endauth
@endsection
