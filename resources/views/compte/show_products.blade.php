@extends('layouts.layout_client')

@section('content')
    <div class="container">
        <h3>Products Associated with Account {{ $compte->num_cmt }}</h3>
        @if ($compte->produits->isNotEmpty())
            <ul>
                @foreach ($compte->produits as $produit)
                    <li>{{ $produit->carte->libelle }}</li>

                @endforeach
            </ul>
        @else
            <p>No products associated with this account.</p>
        @endif
    </div>
@endsection
