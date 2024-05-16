@extends('layouts.layout_home')

@section('content')
    <div class="container">
        <h1>Order Product for Account: {{ $compte->num_cmt }}</h1>

        <form action="{{ route('compte.store_product_order', ['id' => $compte->id_cmpt]) }}" method="POST">
            @csrf
            <label for="product_name">Product:</label>
            <select name="product_name" id="product_name">
                <option value="">Select Product</option>
                @foreach($cartes as $carte)
                <option value="{{ $carte->id_carte }}">{{ $carte->libelle }}</option>
                @endforeach
            </select>
            
            <button type="submit">Confirm Order</button>
        </form>
    </div>
@endsection
