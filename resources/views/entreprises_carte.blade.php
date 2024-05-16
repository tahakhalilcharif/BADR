@extends('layouts.layout_home')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/particuliers.css') }}">
@endsection
@section('title', 'Entreprise_carte')


@section('content-public')
    <div id="myWrapperContainer">
        <div class="wrapper">
            <img src="{{ asset('images/carte_affaire_badr.jpg') }}">
            <div class="text-box">
                <h2>'THE' means of payment for professionals</h2>
                <p style="color: #555;font-size: 18px;"> The business card is a payment and withdrawal bank card intended for
                    businesses, to cover their various professional expenses (payment of charges: invoices, taxes, fees,
                    etc.) 7 days a week, 24 hours a day. It is possible to use several cards on the same account. </p>

            </div>
        </div>
        <details>
            <summary> Who can benefit from the business card </summary>
            <div class="collapsible-content">
                <h6>
                    The business card can be taken out in the name of a physical person or previously authorized by them for
                    the benefit of the company holding the BADR commercial account for various professional activities
                    (artisans, farmers, liberal professions, etc.) as well.</h6>
                <p>*
                    Traders who are natural persons</p>
                <p>* Commercial companies </p>
                <p>*Public companies. </p>



                <p>* The ministers
                </p>

                <p>* Public administrations</p>

            </div>
        </details>

        <details>
            <summary> The functionalities of the business card </summary>
            <div class="collapsible-content">

                <p>* The business card is an interbank card valid in Algeria, it allows you to make transactions 7 days a
                    week and 24 hours a day. </p>
                <p>* Withdrawals from ATM/BADR ATMs and fellow banks (established on the national territory)</p>
                <p>* Payments to merchants with TPEs </p>
                <p>* Online payments (e-payment) from all web merchants, affiliated with the interbank electronic payment
                    network. </p>
                <p>* The BADRSMS service allows the customer holding the business card to follow the operations carried out
                    by the card.</p>


            </div>
        </details>




    </div>

@endsection
