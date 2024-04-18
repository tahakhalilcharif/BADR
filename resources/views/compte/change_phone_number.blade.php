@extends('layouts.layout_home')

@section('content')
    <div style="border: 2px solid rgb(14, 110, 38);">
        <h1>Change Phone Number</h1>
        <form action="{{ route('update_phone_number') }}" method="POST">
            @csrf
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br><br>
            
            <label for="new_phone_number">New Phone Number:</label>
            <input type="tel" id="new_phone_number" name="new_phone_number" required><br><br>
            
            <button type="submit">Change Phone Number</button>
        </form>
    </div>
@endsection
