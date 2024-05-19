@extends('layouts.layout_emp')

@section('head')

<link rel="stylesheet" href="{{ asset('css/uniactivated_user.css') }}">

@endsection


@section('content-emp')

@if ($unactivated_users->isNotEmpty())
<div class="users-section">
    <h3 class="section-title">Unactivated Users</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>Activation Code</th>
                <th>Is Activated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unactivated_users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ optional($user->activationCode)->activation_code }}</td>
                    <td>{{ $user->verified ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

<div class="users-section">
    <h3 class="section-title">All Users</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Created at</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
