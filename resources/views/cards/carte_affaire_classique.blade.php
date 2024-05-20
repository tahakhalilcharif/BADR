<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/carte_affaire_classique.css') }}">
    <title>@yield('title' , 'Page Title')</title>
</head>
<body>
    <div class="card-containter_carte_affaire_c">
        <div class="card_carte_affaire_c">
            <div class="card-inner_carte_affaire_c">
                <div class="front_carte_affaire_c">
                    <img src="{{ asset('images/blue_world.jpg') }}" alt="map" class="map-img_carte_affaire_c">
                    <div class="row_carte_affaire_c">
                        <img src="{{ asset('images/chip.png') }}" alt="chip" width="60px">
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="80px">
                        <img src="{{ asset('images/cib.png') }}" alt="cib" width="50px">
                    </div>

                    <div class="row_carte_affaire_c no-card_carte_affaire_c">
                        <p>{{ implode(' ', str_split($produit->numero_carte, 4)) }}</p>
                    </div>
                    <div class="row_carte_affaire_c card-holder_carte_affaire_c">
                        <p>Card Holder</p>
                        <p>Valid Until</p>
                    </div>
                    <div class="row_carte_affaire_c">
                        <p class="card-holder-information_carte_affaire_c">
                            {{$client->nom}} {{$client->prenom}}
                        </p>
                        {{ date('m/y', strtotime($produit->date_expiration)) }}
                    </div>
                </div>
                <div class="back_carte_affaire_c">
                    <img src="{{ asset('images/map.png') }}" alt="map" class="map-img_carte_affaire_c">
                    <div class="bar_carte_affaire_c"></div>
                    <div class="row_carte_affaire_c card-cvv2_carte_affaire_c">
                        <div>
                            <img src="{{ asset('images/pattern.png') }}" alt="pattern">
                        </div>
                        <p> {{$produit->cvv2}} </p>
                    </div>
                    <div class="row_carte_affaire_c card-text_carte_affaire_c">
                        <p>BADR Bank - Algeria Head office 17, Bd Colonel Amirouche, B.P 484, Algiers.
                        </p>
                    </div>
                    <div class="row_carte_affaire_c signature_carte_affaire_c">
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

