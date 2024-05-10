@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/particuliers.css') }}">
@endsection
@section('title', 'Particuliers')


@section('content-public')
<div id="myWrapperContainer">
    <div class="wrapper">
        <img src="{{ asset('images/project-6-560x690.jpg') }}" >
        <div class="text-box">
            <h2>An account that guarantees the proper management of your activity and liquidity</h2>
            <div class="sophisticated-list">
                <p>
                    Guarantee the fluidity of your banking transactions.</p>
                <p>Access personalized banking services and cash flow facilities.</p>
                <p>Benefit from effective monitoring of your operations even remotely..</p>
            </div>
        </div>
    </div>
    <details>
        <summary>    ABOUT LUNCH ACCOUNT </summary>
        <div class="collapsible-content">
            <h5  >
                An account that guarantees the good management of your activity and liquidity </h5>
            <p>* Guarantee the fluidity of your banking transactions</p>
            <p>* Access personalized banking services and cash flow facilities </p>
            <p>*Benefit from effective monitoring of your operations even remotely. </p>


           <h5   >
            Why choose the BADR current account?</h5>
            <h6 >The BADR current account allows you to: </h6>
           <p>* Create a basis for your company's relationship with the bank
           </p>
           <p>* Equip yourself with several payment methods to facilitate your movement of funds
            </p>
           <p>* Benefit from efficient management of your cash flow
          </p>
           <p > In addition, with your BADR dinar checking account, you can: </p>
           <p>
           * Payments/Withdrawals/Transfers </p>
           <p> * Payments by checks .</p>
            <p>* Check remittances .</p>
           <p>* Collections of bills .</p>
           <p>* Cashier's checks. </p>
           <p>* DAT investments/ Cash certificates/ Securities/ Stocks/ Bonds.
        </p>
        <h5  >Eligibility:</h5>
        <h6>
            Any natural or legal person having a commercial, agricultural, industrial activity, etc. </h6>
            <p> * Presentation of a valid identity document.</p>
             <p>* Official document establishing proof of address. </p>
            <p>* Copy of the company's statutes, trade register and/or approval. </p>
            <p>* Proof of statistical and tax identification numbers.</p>
        </div>
    </details>

    <details>
        <summary>    ABOUT CURRENCY ACCOUNT </summary>
        <div class="collapsible-content">
            <h5> Why choose the BADR currency account ? </h5>
            <h6>With the BADR currency account, you can:</h6>
            <p>* Have a basis for all your international banking relationships </p>
            <p>* Domiciling your income from abroad</p>
            <p>* Equip yourself with an international VISA or MASTER CARD </p>
            <p>* Make your purchases/withdrawals abroad via international cards </p>
            <p>* Have the ability to pay for international purchases on the internet</p>
            <p>*Monitor the movements and balance of your account remotely wherever you are (on computer, tablet or smart phone) e-banking, SMS-banking, etc. </p>
            <h5  >Eligibility:</h5>
            <p> Any adult natural person. </p>
            <h5>Creation of the file: </h5>
            <P>* Presentation of a valid identity document</P>
            <p>* Official document establishing proof of address.</p>
            <h5> For companies : </h5>
            <p>* Statutes of the company or association </p>
            <p>* Trade register and/or approval decision for the association</p>
            <p>* Proof of statistical and tax identification numbers</p>
             <h5> For foreigners or Algerians residing abroad: </h5>
            <p>* Residence permit</p>
        </div>
    </details>

    <details>
        <summary>    ABOUT CEDAC ACCOUNT</summary>

        <div class="collapsible-content">
            <p>
                Account in convertible dinars, opened in the name of a foreign resident natural or legal person.</p>

        </div>
    </details>


</div>

@endsection

