<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/carte_affaire_gold.css') }}">
    <title>@yield('title' , 'Page Title')</title>
</head>
<body>
    <div class="card-containter_carte_affaire_g">
        <div class="card_carte_affaire_g">
            <div class="card-inner_carte_affaire_g">
                <div class="front_carte_affaire_g">
                    <img src="{{ asset('images/gold.jpg') }}" alt="gold" class="map-img_carte_affaire_g">
                    <div class="row_carte_affaire_g">
                        <img src="{{ asset('images/chip.png') }}" alt="chip" width="60px">
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="80px">
                        <img src="{{ asset('images/cib.png') }}" alt="cib" width="50px">
                    </div>

                    <div class="row_carte_affaire_g no-card_carte_affaire_g">
                        <p>{{ implode(' ', str_split($produit->numero_carte, 4)) }}</p>
                    </div>
                    <div class="row_carte_affaire_g card-holder_carte_affaire_g">
                        <p>Card Holder</p>
                        <p>Valid Until</p>
                    </div>
                    <div class="row_carte_affaire_g">
                        <p class="card-holder-information_carte_affaire_g">
                            {{$client->nom}} {{$client->prenom}}
                        </p>
                        {{ date('m/y', strtotime($produit->date_expiration)) }}
                    </div>
                </div>
                <div class="back_carte_affaire_g">
                    <img src="{{ asset('images/gold.jpg') }}" alt="gold" class="map-img_carte_affaire_g">
                    <div class="bar_carte_affaire_g"></div>
                    <div class="row_carte_affaire_g card-cvv2_carte_affaire_g">
                        <div>
                            <img src="{{ asset('images/pattern.png') }}" alt="pattern">
                        </div>
                        <p> {{$produit->cvv2}} </p>
                    </div>
                    <div class="row_carte_affaire_g card-text_carte_affaire_g">
                        <p>BADR Bank - Algeria Head office 17, Bd Colonel Amirouche, B.P 484, Algiers.
                        </p>
                    </div>
                    <div class="row_carte_affaire_g signature_carte_affaire_g">
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

