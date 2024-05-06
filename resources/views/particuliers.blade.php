@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/particuliers.css') }}">
@endsection
@section('title', 'Particuliers')


@section('content-public')
<div id="myWrapperContainer">
    <div class="wrapper">
        <img src="{{ asset('images/carte_affaire_badr.jpg') }}" alt="Carte d'affaires Badr">
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
            <p>This is where you can put additional information or options.</p>

        </div>
    </details>

    <details>
        <summary>    ABOUT A CURRENCY BANK ACCOUNT </summary>
        <div class="collapsible-content">
            <p>This is where you can put additional information or options.</p>

        </div>
    </details>

    <details>
        <summary>    ABOUT A CURRENCY BANK ACCOUNT </summary>
        <div class="collapsible-content">
            <p>This is where you can put additional information or options.</p>
           
        </div>
    </details>


</div>

@endsection



@section('scripts')


@endsection
