@extends('layouts.layout_home')

@section('head')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('title', 'BADR BANQUE - Banque de l’Agriculture et du Développement Rural
')

@section('content')
<div id="main-container">
    <section class="client">
        <div class="background-image" style="background-image: url('{{ asset('images/homee.avif') }}');">
        </div>
    </section>
<section class="services">
    <h1 class="heading">services </h1>
    <div class="box-container">
        <div class="box">
            <img src="{{ asset('images/icon1.png') }}">
            <h3> My informations</h3>
        </div>

        <div class="box">
            <img src="{{ asset('images/icone2.png') }}">
            <h3>My products </h3>

        </div>

        <div class="box">
            <img src="{{ asset('images/icone3.png') }}">
            <h3> My transaction </h3>
        </div>

        <div class="box">
            <img src="{{ asset('images/icon4.png') }}">
            <h3>My accounts</h3>

        </div>

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