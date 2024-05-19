<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logobadr.png') }}" alt="BADR BANQUE">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <ul>
                            <li class="badr-nav-link nav-link"><a href="{{ route('employee.home_emp') }}">Home</a></li>
                            <li class="badr-nav-link nav-link">
                                <form action="/logout" method="GET">
                                    @csrf
                                    <a href="/logout">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="{{ route('employee.home_emp') }}">Home</a></li>
            <li><a href="{{ route('employee.clients') }}">Clients</a></li>
            <li><a href="{{ route('employee.users') }}">Users</a></li>
            <li><a href="{{ route('employee.demands') }}">Demands</a></li>
            <li><a href="{{ route('employee.accounts') }}">Accounts</a></li>
            <li><a href="{{ route('employee.statistics') }}">Statistics</a></li>
        </ul>
    </div>

    <div class="content">
        @yield('content-emp')
    </div>
</body>
</html>
