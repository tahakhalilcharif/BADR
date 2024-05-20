<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/card_islamique.css') }}">
    <title>@yield('title' , 'Page Title')</title>
</head>
<body>
    <div class="card-containter_cib_islamique">
        <div class="card_cib_islamique">
            <div class="card-inner_cib_islamique">
                <div class="front_cib_islamique">
                    <img src="{{ asset('images/islamique.jpg') }}" alt="islamique" class="map-img_cib_islamique">
                    <div class="row_cib_islamique">
                        <img src="{{ asset('images/chip.png') }}" alt="chip" width="60px">
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="80px">
                        <img src="{{ asset('images/cib.png') }}" alt="cib" width="50px">
                    </div>

                    <div class="row_cib_islamique no-card_cib_islamique">
                        <p>{{ implode(' ', str_split($produit->numero_carte, 4)) }}</p>
                    </div>
                    <div class="row_cib_islamique card-holder_cib_islamique">
                        <p>Card Holder</p>
                        <p>Valid Until</p>
                    </div>
                    <div class="row_cib_islamique">
                        <p class="card-holder-information_cib_islamique">
                            {{$client->nom}} {{$client->prenom}}
                        </p>
                        {{ date('m/y', strtotime($produit->date_expiration)) }}
                    </div>
                </div>
                <div class="back_cib_islamique">
                    <img src="{{ asset('images/islamique.jpg') }}" alt="islamique" class="map-img_cib_islamique">
                    <div class="bar_cib_islamique"></div>
                    <div class="row_cib_islamique card-cvv2_cib_islamique">
                        <div>
                            <img src="{{ asset('images/pattern.png') }}" alt="pattern">
                        </div>
                        <p> {{$produit->cvv2}} </p>
                    </div>
                    <div class="row_cib_islamique card-text_cib_islamique">
                        <p>BADR Bank - Algeria Head office 17, Bd Colonel Amirouche, B.P 484, Algiers.
                        </p>
                    </div>
                    <div class="row_cib_islamique signature_cib_islamique">
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

