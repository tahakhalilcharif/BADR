@extends('layouts.layout_emp')

@section('content-emp')
    <h3>Unactivated Users</h3>
    <table class="table">
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

    <h3>All Users</h3>
    <table class="table">
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
@endsection
