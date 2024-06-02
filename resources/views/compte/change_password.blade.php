@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info_client.css') }}">
@endsection
@section('title', 'Change Password')

@section('content')


    <div class="change">
        <h1>Change Password</h1>
        <form action="{{ route('update_password') }}" method="POST">
            @csrf
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br><br>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required><br><br>

            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>

            <button type="submit">Change Password</button>
        </form>
    </div>

    <div class="account-actions">
        <h2>Account Actions:</h2>
        <ul>
            <li><a href="{{ route('change_password') }}">Change Password</a></li>
            <li><a href="{{ route('change_email') }}">Change Email</a></li>
            <li><a href="{{ route('change_phone_number') }}">Change Phone Number</a></li>
            <li><a href="{{ route('compte.info_client') }}">My Information</a></li>
        </ul>
    </div>

@endsection
