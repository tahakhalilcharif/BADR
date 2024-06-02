@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/info_client.css') }}">
@endsection

@section('title', 'Account Details')

@section('content')
@auth
@if($compte->statut === 'actif')
    <div class="account-details">
        <h1>Account Details</h1>
        <div class="divider"></div>
        <p>Account number: {{ $compte->num_cmt }}</p>
        <p>Current Balance: {{ $compte->solde }}</p>
        <p>Type: {{ $compte->classeLibelle() }}</p>
        <h2>Products</h2>
        <div class="divider"></div>

        @if ($compte->produits()->exists())
            <ul>
                @if ($compte->produits->isNotEmpty())
                    @foreach ($compte->produits as $produit)
                        @if ($compte->id_cmpt === $produit->id_compte)
                            <h4>{{ $produit->carte->libelle }}</h4>
                            @if ($produit->carte->libelle === 'CIB Classique')
                                @include('cards.cib_classique', ['produit' => $produit, 'client' => $client])
                            @elseif ($produit->carte->libelle === 'CIB Gold')
                                @include('cards.cib_gold', ['produit' => $produit, 'client' => $client])
                            @elseif ($produit->carte->libelle === 'CIB Islamique')
                                @include('cards.cib_islamique', ['produit' => $produit, 'client' => $client])
                            @elseif ($produit->carte->libelle === 'Carte Affaire Classique')
                                @include('cards.carte_affaire_classique', ['produit' => $produit, 'client' => $client])
                            @elseif ($produit->carte->libelle === 'Carte Affaire Gold')
                                @include('cards.carte_affaire_gold', ['produit' => $produit, 'client' => $client])
                            @elseif ($produit->carte->libelle === 'Mastercard Classique')
                                @include('cards.mastercard_classique', ['produit' => $produit, 'client' => $client])
                            @elseif ($produit->carte->libelle === 'Mastercard Titanium')
                                @include('cards.mastercard_titanium', ['produit' => $produit, 'client' => $client])
                            @endif

                            <p>Validity : {{$produit->statut}}</p>
                            <p>Expiry Date : {{$produit->date_expiration}}</p>
                        @endif
                    @endforeach
                @else
                    <p>No products associated with this account.</p>
                @endif
            </ul>
        @else
            @if ($demandes->isNotEmpty())
                @foreach ($demandes as $demande)
                    <h4>Your demand for {{ $demande->carte->libelle }} is submitted</h4>
                @endforeach
            @else
                <p>No products associated with this account.</p>
            @endif
        @endif
    </div>
    <div class="account-actions">
        <h2>Account Actions:</h2>
        <ul>
            <li><a href="{{ route('compte.transaction', ['num_cmt' => $compte->num_cmt]) }}">Transaction</a></li>
            <li><a href="{{ route('compte.account_statement', ['num_cmt' => $compte->num_cmt]) }}">Account statement</a></li>
            @if (!$compte->produits()->exists() && $demandes->isEmpty())
                <li><a href="{{ route('compte.demand_product', ['id' => $compte->id_cmpt]) }}">Order Product</a></li>
            @endif
        </ul>
    </div>
@endif
@endauth

@endsection
