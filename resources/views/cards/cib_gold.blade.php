<!-- cib_gold.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/card_CIB_G.css') }}">
    <title>@yield('title' , 'Page Title')</title>
</head>
<body>
    <div class="card-containter">
        <div class="card">
            <div class="card-inner">
                <div class="front_cib_gold">
                    <img src="{{ asset('images/map.png') }}" alt="map" class="map-img">
                    <div class="row_cib_gold">
                        <img src="{{ asset('images/chip.png') }}" alt="chip" width="60px">
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="80px">
                        <img src="{{ asset('images/cib.png') }}" alt="cib" width="50px">
                    </div>

                    <div class="row_cib_gold no-card_cib_gold">
                        <p>{{ implode(' ', str_split($produit->numero_carte, 4)) }}</p>
                    </div>
                    <div class="row_cib_gold card-holder_cib_gold">
                        <p>Card Holder</p>
                        <p>Valid Until</p>
                    </div>
                    <div class="row_cib_gold">
                        <p class="card-holder-information_cib_gold">
                            {{$client->nom}} {{$client->prenom}}
                        </p>
                        {{ date('m/y', strtotime($produit->date_expiration)) }}
                    </div>
                </div>
                <div class="back_cib_gold">
                    <img src="{{ asset('images/map.png') }}" alt="map" class="map-img">
                    <div class="bar_cib_gold"></div>
                    <div class="row_cib_gold card-cvv2_cib_gold">
                        <div>
                            <img src="{{ asset('images/pattern.png') }}" alt="pattern">
                        </div>
                        <p> {{$produit->cvv2}} </p>
                    </div>
                    <div class="row_cib_gold card-text_cib_gold">
                        <p>BADR Bank - Algeria Head office 17, Bd Colonel Amirouche, B.P 484, Algiers.
                        </p>
                    </div>
                    <div class="row_cib_gold signature_cib_gold">
                        <p>CUSTOMER SIGNATURE</p>
                        <img src="{{ asset('images/badr.png') }}" alt="badr" width="60px" height="60px" >
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>

