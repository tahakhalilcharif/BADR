@extends('layouts.layout_home')

@section('content')
    <div style="border: 2px solid rgb(14, 110, 38);">
        <h1>Change Email</h1>
        <form action="{{ route('update_email') }}" method="POST">
            @csrf
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br><br>
            
            <label for="new_email">New Email:</label>
            <input type="email" id="new_email" name="new_email" required><br><br>
            
            <button type="submit">Change Email</button>
        </form>
    </div>
@endsection
