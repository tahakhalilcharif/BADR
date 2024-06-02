@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info_client.css') }}">
@endsection

@section('title' , 'Display Products')

@section('content')
    <div class="container">
        <h3>Products Associated with Account {{ $compte->num_cmt }}</h3>
        @if ($compte->produits->isNotEmpty())
            <ul>
                @foreach ($compte->produits as $produit)
                    <li>{{ $produit->carte->libelle }}</li>
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
                @endforeach


            </ul>
        @else
            <p>No products associated with this account.</p>
        @endif
    </div>
@endsection
