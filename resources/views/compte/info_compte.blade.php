@extends('layouts.layout_client')

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
    @endauth
@endsection
