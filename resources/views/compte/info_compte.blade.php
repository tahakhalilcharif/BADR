@extends('layouts.layout_home')

@section('content')
    @auth
        @if($compte->statut === 'actif')
            <div class="container">
                <h1>Account Details</h1>
                <p>Account number : {{ $compte->num_cmt }}</p>
                <p>Current Balance : {{ $compte->solde }}</p>
                <p>Type : {{ $compte->classeLibelle()}}</p>
                <h2>Products</h2>
                @if ($compte->produits()->exists())
                    <ul>
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
                    </ul>
                @else
                        @if ($demandes->isNotEmpty())
                            @foreach ($demandes as $demande)
                                <h4>Your demand for {{ $demande->carte->libelle }} is submitted</h4>
                            @endforeach
                        @else
                            <p>No products associated with this account.</p>
                            <form action="{{ route('compte.demand_product', ['id' => $compte->id_cmpt]) }}" method="GET">
                                @csrf
                                <button type="submit">Order Product</button>
                            </form>
                        @endif
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
            <input type="text" name="recipient_account_number" id="recipient_account_number" required>
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" min="500" required>
            <button type="submit">Transfer</button>
        </form>
        @else
         <p> you don't have money </p>
        @endif
    @endauth
@endsection
