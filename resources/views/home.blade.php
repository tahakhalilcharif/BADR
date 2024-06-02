@extends('layouts.layout_home')

@section('head')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homeclient.css') }}">
@endsection
@section('title', 'BADR BANQUE - Banque de l’Agriculture et du Développement Rural
')

@section('content')
<div id="main-container">
    <section class="welcome-section">
        <h1 class="welcome-title">Bienvenue, nous sommes ravis que vous ayez rejoint notre famille</h1>
        <p class="welcome-text">Voici un aperçu de vos comptes et services.</p>
    </section>

    <section class="exchange-rates-section">
        <h2 class="section-title">Taux de change</h2>
        <div class="exchange-rates">
            <div class="exchange-rate">
                <h3 class="currency-title">Euro (EUR) - Dinar (DZD)</h3>
                <p class="rate rate-red">1 EUR = 180 DZD</p>
            </div>
            <div class="exchange-rate">
                <h3 class="currency-title">Euro (EUR) - Dollar (USD)</h3>
                <p class="rate rate-red">1 EUR = 1.20 USD</p>
            </div>
            <div class="exchange-rate">
                <h3 class="currency-title">Dinar (DZD) - Dollar (USD)</h3>
                <p class="rate rate-red">1 DZD = 0.0074 USD</p>
            </div>
        </div>
    </section>


    <section class="services-client" id="services">
        <h2 class="section-title">Services</h2>
        <div class="services-list">
            <div class="service-item">
                <img src="{{ asset('images/icon1.png') }}" alt="Informations">
                <h3 class="service-title">Mes informations</h3>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/icone2.png') }}" alt="Produits">
                <h3 class="service-title">Mes produits</h3>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/icone3.png') }}" alt="Transactions">
                <h3 class="service-title">Mes transactions</h3>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/icon4.png') }}" alt="Comptes">
                <h3 class="service-title">Mes comptes</h3>
            </div>
        </div>
    </section>

    <section class="quick-action-section">
        <h2 class="section-title">Payer mes factures</h2>
        <div class="quick-actions">
            <a href="https://www.djezzy.dz/" class="quick-action-item">
                <div class="action-box">
                    <img src="{{ asset('images/djezzy.jpg') }}"alt="Facture 1">

                </div>
            </a>
            <a href="https://www.sonelgaz.dz/fr" class="quick-action-item">
                <div class="action-box">
                    <img src="{{ asset('images/sonalgaz.jpg') }}" alt="Facture 2">

                </div>
            </a>

            <a href="https://www.algerietelecom.dz/fr/" class="quick-action-item">
                <div class="action-box">
                    <img src="{{ asset('images/algerietelec.png') }}" alt="Facture 2">

                </div>
            </a>

            <a href="https://seaal.dz/fr/" class="quick-action-item">
                <div class="action-box">
                    <img src="{{ asset('images/seaal.jpg') }}" alt="Facture 2">

                </div>
            </a>

            <a href="https://www.ooredoo.dz/fr/" class="quick-action-item">
                <div class="action-box">
                    <img src="{{ asset('images/ooredoo.png') }}" alt="Facture 2">

                </div>
            </a>

            <a href="https://www.mobilis.dz/" class="quick-action-item">
                <div class="action-box">
                    <img src="{{ asset('images/mobilis.png') }}" alt="Facture 2">

                </div>
            </a>

        </div>
    </section>



</div>

@endsection






@section('content-public')
    <div id="myhomecontainer">

        <section class="home">
            <div class="background-carousel">
                <div class="background-image" style="background-image: url('{{ asset('images/badrrr.jpg') }}');"></div>

                <div class="background-image" style="background-image: url('{{ asset('images/home.jpg') }}');"></div>

                <div class="background-image" style="background-image: url('{{ asset('images/badrrrr.jpg') }}');"></div>
                <div class="background-image" style="background-image: url('{{ asset('images/home.jpg') }}');"></div>
                <div class="background-image" style="background-image: url('{{ asset('images/ble.avif') }}');"></div>
            </div>
            <!-- Contenu de la section home -->

            <div class="content-box">
                <h1>your trusted partner !</h1>
                <p>"
                    Benefit from elite online service with us where customer satisfaction is our priority."</p>
            </div>

        </section>







        <section class="services">
            <h1 class="heading">Discover our exceptional services </h1>
            <div class="box-container">
                <div class="box">
                    <img src="{{ asset('images/cartebanc.png') }}">
                    <h3> MONETICS</h3>
                    <P> card CIB, CIB gold and international card</P>
                </div>

                <div class="box">
                    <img src="{{ asset('images/bancacc.png') }}">
                    <h3>Bank account </h3>
                    <p> opening a dinar or currency account</p>
                </div>

                <div class="box">
                    <img src="{{ asset('images/commerce.png') }}">
                    <h3>international commerce </h3>
                    <p> take advantage of international purchases</p>
                </div>

                <div class="box">
                    <img src="{{ asset('images/bank.png') }}">
                    <h3>bank insurance</h3>
                    <p> a wide range of insurance for the benefit of our customers</p>
                </div>

                <div class="box">
                    <img src="{{ asset('images/credit.png') }}">
                    <h3>credit </h3>
                    <p> take advantage of our wide range of credit</p>
                </div>
            </div>
        </section>


        <section class="description">

            <div class="wrapper">
                <img src="{{ asset('images/bad.jpg') }}" >
                <div class="text-box">
                    <h2>"Secure Your Financial Future with Our Bank: Tailored Investments for Growth and Peace of Mind"</h2>
                    <p>
                        Investing in our bank is more than just a financial transaction; it's a partnership aimed at securing your financial future. With our proven expertise, we offer tailored investment solutions that maximize returns while minimizing risks. Our commitment to technological innovation ensures optimal accessibility to your accounts, allowing you to monitor and manage your investments with ease. By choosing our bank, you're opting for stability, growth, and peace of mind for yourself and your loved ones. </p>

                    </div>
                </div>
            </div>
        </section>





    </div>

@endsection


@section('scripts')

@if (session('status'))
<script>
    alert("{{ session('status') }}");
</script>
@endif

@endsection
