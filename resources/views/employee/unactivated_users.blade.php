@extends('layouts.layout_emp')

@section('head')

<link rel="stylesheet" href="{{ asset('css/uniactivated_user.css') }}">

@endsection

@section('content-emp')
<h1 class="page-title">Unactivated Users</h1>

@if($unactivatedUsers->isEmpty())
    <p class="empty-message">No unactivated users found.</p>
@else
    <table class="styled-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Activation Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unactivatedUsers as $user)
                <tr>
                    <td>{{ $user->user->name }}</td>
                    <td>{{ $user->activation_code }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
