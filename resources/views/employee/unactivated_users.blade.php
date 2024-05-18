@extends('layouts.layout_emp')

@section('content-emp')
    <h1>Unactivated Users</h1>

    @if($unactivatedUsers->isEmpty())
        <p>No unactivated users found.</p>
    @else
        <table>
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
