@extends('layouts.layout_home')

@section('head')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">
@endsection
 @section('title','BADR Bank')

@section('content')
    <div class="auth-container">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Log out</button>
        </form>

        <form action="{{ route('compte.info_client') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">View Account</button>
        </form>
    </div>
    @endsection

    @section('content-public')
    <div class="wrapper">
        <img src="{{ asset('images/project-6-560x690.jpg') }}" alt="Project image" class="project-image">
        <div class="text-box">
            <h2>About BADR</h2>
            <p>The Banque de l'Agriculture et du Développement Rural (BADR) is a national financial institution created on March 13, 1982. For over 40 years, BADR has been fully committed to promoting the agricultural sector and rural development in Algeria. We offer a wide range of financial products and services to our clients.</p>

            <h2>Our Sectors</h2>
            <p>We facilitate financing for various sectors of activity including agriculture, agro-industry, fishing, and aquaculture, and support their growth and development.</p>

            <h2>Our Commitment</h2>
            <p>We offer financial services and tailored solutions to actively support the development of our clientele.</p>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endsection
