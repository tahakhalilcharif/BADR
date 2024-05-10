@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/particuliers.css') }}">
@endsection
@section('title', 'Particuliers')


@section('content-public')
<div id="myWrapperContainer">
    <div class="wrapper">
        <img src="{{ asset('images/part.jpg') }}" alt="Carte d'affaires Badr">
        <div class="text-box">
            <h2>An account to make managing your money easier</h2>
            <div class="sophisticated-list">
                <p>Free account opening and a free CIB card.</p>
                <p>Availability of your money.</p>
                <p>The BADR checking account allows you to carry out various banking operations such as withdrawal, payment, and transfer from account to account.</p>
            </div>
        </div>
    </div>
    <details>
        <summary>    ABOUT A DINARS BANK ACCOUNT </summary>
        <div class="collapsible-content">
            <h5>  File to provide: </h5>
            <p>* Copy of valid identity document </p>
            <p>* An identity photo </p>
            <p>* A birth certificate </p>
            <p>* Residence or proof of residence</p>

           <h5>
            Opening an account allows you to have: </h5>
           <p>* Checkbook
           </p>
           <p>* CIB card
            </p>
           <p>* BADRSMS
          </p>
           <p>* BADR Net </p>
        </div>
    </details>

    <details>
        <summary>    ABOUT A CURRENCY BANK ACCOUNT </summary>
        <div class="collapsible-content">
            <p>
                The BADR currency account is an account that works with a single currency.
                It allows you to receive currency and make payments for your transactions abroad.</p>
            <h5> File to provide: </h5>
            <p>* Copy of valid identity document</p>
            <p>* An identity photo </p>
            <p>* A birth certificate </p>
            <p>* Residence or proof of residence</p>

        </div>
    </details>

    <details>
        <summary>    ABOUT A CEDAC ACCOUNT</summary>

        <div class="collapsible-content">
            <p>
                Account in convertible dinars, opened in the name of a foreign resident natural or legal person.</p>

        </div>
    </details>


</div>

@endsection

