<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/mastercard_classique.css') }}">
    <title>@yield('title' , 'Page Title')</title>
</head>
<body>
    <div class="card-containter_mastercard_c">
        <div class="card_mastercard_c">
            <div class="card-inner_mastercard_c">
                <div class="front_mastercard_c">
                    <img src="{{ asset('images/map.png') }}" alt="map" class="map-img_mastercard_c">
                    <div class="row_mastercard_c">
                        <img src="{{ asset('images/grey_chip.jpg') }}" alt="grey chip" width="60px">
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="80px">
                        <img src="{{ asset('images/mastercard.png') }}" alt="mastercard" width="100px">
                    </div>

                    <div class="row_mastercard_c no-card_mastercard_c">
                        <p>{{ implode(' ', str_split($produit->numero_carte, 4)) }}</p>
                    </div>
                    <div class="row_mastercard_c card-holder_mastercard_c">
                        <p>Card Holder</p>
                        <p>Valid Until</p>
                    </div>
                    <div class="row_mastercard_c">
                        <p class="card-holder-information_mastercard_c">
                            {{$client->nom}} {{$client->prenom}}
                        </p>
                        {{ date('m/y', strtotime($produit->date_expiration)) }}
                    </div>
                </div>
                <div class="back_mastercard_c">
                    <img src="{{ asset('images/map.png') }}" alt="map" class="map-img_mastercard_c">
                    <div class="bar_mastercard_c"></div>
                    <div class="row_mastercard_c card-cvv2_mastercard_c">
                        <div>
                            <img src="{{ asset('images/pattern.png') }}" alt="pattern">
                        </div>
                        <p> {{$produit->cvv2}} </p>
                    </div>
                    <div class="row_mastercard_c card-text_mastercard_c">
                        <p>BADR Bank - Algeria Head office 17, Bd Colonel Amirouche, B.P 484, Algiers.
                        </p>
                    </div>
                    <div class="row_mastercard_c signature_mastercard_c">
                        <p>CUSTOMER SIGNATURE</p>
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="60px" height="60px">
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>

