@extends('layouts.layout_home')

@section('content')
    <div style="border: 2px solid rgb(14, 110, 38);">
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
@endsection
