@extends('layouts.layout_home')

@section('content')
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
@endsection
