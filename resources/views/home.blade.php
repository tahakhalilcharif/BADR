@extends('layouts.layout_home')

@section('content')
    @auth
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <form action="{{ route('compte.info_client') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">View Account</button>
    </form>

    @else
    <h1>you are logged out</h1>
    <form action="/login" method="POST">
        @csrf
        <button><a href="/login">Log in</a></button>
    </form>
    @endauth
@endsection
