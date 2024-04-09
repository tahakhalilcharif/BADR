<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/mastercard_titanium.css') }}">
    <title>@yield('title' , 'Page Title')</title>
</head>
<body>
    <div class="card-containter">
        <div class="card">
            <div class="card-inner">
                <div class="front">
                    <img src="{{ asset('images/map.png') }}" alt="map" class="map-img">
                    <div class="row">
                        <img src="{{ asset('images/grey_chip.jpg') }}" alt="grey chip" width="60px">
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="80px">
                        <img src="{{ asset('images/mastercard.png') }}" alt="mastercard" width="100px">
                    </div>

                    <div class="row no-card">
                        <p>{{ implode(' ', str_split($produit->numero_carte, 4)) }}</p>
                    </div>
                    <div class="row card-holder">
                        <p>Card Holder</p>
                        <p>Valid Until</p>
                    </div>
                    <div class="row">
                        <p class="card-holder-information">
                            {{$client->nom}} {{$client->prenom}}
                        </p>
                        {{ date('m/y', strtotime($produit->date_expiration)) }}
                    </div>
                </div>
                <div class="back">
                    <img src="{{ asset('images/map.png') }}" alt="map" class="map-img">
                    <div class="bar"></div>
                    <div class="row card-cvv2">
                        <div>
                            <img src="{{ asset('images/pattern.png') }}" alt="pattern">
                        </div>
                        <p> {{$produit->cvv2}} </p>
                    </div>
                    <div class="row card-text">
                        <p>BADR Bank - Algeria Head office 17, Bd Colonel Amirouche, B.P 484, Algiers.
                        </p>
                    </div>
                    <div class="row signature">
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

