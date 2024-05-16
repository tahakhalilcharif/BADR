@extends('layouts.layout_home')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <link rel="stylesheet" href="{{ asset('css/particarte.css') }}">
@endsection
@section('title', 'Particuliers_carte')


@section('content-public')
    <div id="myWrapper">

        <div class="wrapper">
            <img src="{{ asset('images/cibgold.jpg') }}" alt="Carte d'affaires Badr">
            <img src="{{ asset('images/cibclassique.jpg') }}" alt="Carte d'affaires Badr">

            <div class="text-box">
                <h2>Having a CIB card allows you</h2>
                <div class="sophisticated-list">
                    <p>
                        Carry out banking transactions without traveling.</p>
                    <p>
                        Speed ​​and security of use when making payments and cash withdrawals.</p>
                    <p>Access your account across the entire BADR network and colleagues.</p>
                    <P> Pay for your purchases without having cash on hand. </P>
                </div>
            </div>
        </div>




        <details>
            <summary>
                The Classic CIB card</summary>
            <div class="collapsible-content">
                <h6>Backed by your account, the classic CIB card is an interbank card with a validity period of three years and valid only in Algeria, it allows you to make payments and withdrawals in complete security 24/7</h6>
                <p>*Payments on TPE with merchants.</p>
                <p>*Online payments</p>
                <p>*Des retraits sur DAB/GAB BADR et confrères</p>
                <p>*Consulting your balance on DAB/GAB of the BADR network and colleagues.</p>
            </div>
        </details>

        <details>
            <summary>The Classic CIB Gold card</summary>
            <div class="collapsible-content">
                <h6>Backed by your account, the CIB GOLD card is an interbank card intended for customers whose income exceeds 100,000 DA, with a significant withdrawal limit, valid for three years and valid only in Algeria, it allows you to make payments and secure withdrawals 24/7</h6>
                <p>*Payments on TPE with merchants.</p>
                <p>*Online payments</p>
                <p>*Des retraits sur DAB/GAB BADR et confrères</p>
                <p>*Consulting your balance on DAB/GAB of the BADR network and colleagues.</p>
            </div>
        </details>


        <div class="wrapper">
            <img src="{{ asset('images/masteercard.jpg') }}" alt="Carte d'affaires Badr">
            <img src="{{ asset('images/titanuimcard.jpg') }}" alt="Carte d'affaires Badr">

            <div class="text-box">
                <h2>Travel safely with your MASTER card</h2>
                <p>
                    BADR offers you its international Mastercard card Designed to offer you the highest level of Comfort,
                    Confidence and Security
                <p>
                <div class="sophisticated-list">
                    <p>

                        Withdrawals from DAB/GAB abroad bearing the Mastercard logo.</p>
                    <p>
                        Payments for purchases of goods or services by card on a TPE bearing the Mastercard logo.</p>
                    <p>
                        Online payments (on the internet) on secure sites bearing the Mastercard logo.</p>

                </div>
            </div>
        </div>



        <details>
            <summary> The Classic Mastercard</summary>
            <div class="collapsible-content">
                <p>* A birth certificate </p>
            </div>
        </details>

        <details>
            <summary>The Classic Mastercard Titanium</summary>
            <div class="collapsible-content">
                <p>
                    The BADR currency account is an account that works with a single currency.
                    It allows you to receive currency and make payments for your transactions abroad.
                </p>
            </div>
        </details>

        <details>
            <summary> avantages
            </summary>
            <div class="collapsible-content">
                <p>
                    Des dépenses maitrisées de votre compte permettant la gestion précise et sans risque de votre budget.</p>
                    <h6> Access :
                    </h6>
                    <P> 1.Worldwide acceptance through several million points of sale </P>
                    <p>2.Very broad ATM coverage throughout the world </p>
                    <p>3.Opening up to e-commerce: online or through an application </p>
                    <p>4.Constant and secure access to your money internationally 24/7</p>
                    <h6> Security :
                    </h6>
                    <P> 1.3D secure for your online payments.</P>
                    <p>2.Security assured thanks to EMV chip card technology. </p>

            </div>
        </details>


    </div>



@endsection
