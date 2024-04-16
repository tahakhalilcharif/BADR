@extends('layouts.layout_home')

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
