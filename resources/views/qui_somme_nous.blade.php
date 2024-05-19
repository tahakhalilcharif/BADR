@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/qui-sommes-nous.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
@endsection
@section('title', 'About Us')


@section('content-public')
<div class="wrapper">


            <img src="{{ asset('images/business.jpg') }}" alt="Project image" class="project-image carousel-image">


    <div class="text-box">
        <h2>About BADR</h2>
        <p>The Banque de l'Agriculture et du Développement Rural (BADR) is a national financial institution created on March 13, 1982. For over 40 years, BADR has been fully committed to promoting the agricultural sector and rural development in Algeria. We offer a wide range of financial products and services to our clients.</p>

        <h2>Our Sectors</h2>
        <p>We facilitate financing for various sectors of activity including agriculture, agro-industry, fishing, and aquaculture, and support their growth and development.</p>

        <h2>Our Commitment</h2>
        <p>We offer financial services and tailored solutions to actively support the development of our clientele.</p>
        <p> In order to provide the greatest customer satisfaction, the BADR has placed nearly 8,000 employees at their disposal through its 340 agencies including 3 agencies dedicated to Islamic Finance, and 39 regional operating groups deployed on the national territory, as well as a new information system for greater security, ease, efficiency and speed. </p>
    </div>

</div>

</div>

@endsection

