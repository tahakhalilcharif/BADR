@extends('layouts.layout_home')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/actpage.css') }}">
@endsection

@section('title', 'Activation Page')

@section('content')
    <div class="activation-content">
        <h1>Account Activation</h1>

        <p>Please enter the activation code you received to activate your account.</p>

        @if (session('error'))
            <div>{{ session('error') }}</div>
        @endif

        <form action="{{ route('activate.client') }}" method="POST">
            @csrf
            <label for="activation_code">Activation Code:</label><br>
            <input type="text" id="activation_code" name="activation_code" required><br><br>
            <button type="submit">Activate Account</button>
        </form>
    </div>

@endsection
