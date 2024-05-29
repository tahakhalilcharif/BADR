<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    <div class="topbar">
        <div class="admin-icon">
            <i class="fas fa-user-tie"></i>
        </div>
        <p>{{ $employee->nom }} {{$employee->prenom}}</p>
    </div>


    <div class="sidebar">
        <img src="{{ asset('images/logobadr.png') }}" alt="BADR BANQUE">
        <ul>
            <li><a href="{{ route('employee.home_emp') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('employee.clients') }}"><i class="fas fa-user-friends"></i> Clients</a></li>
            <li><a href="{{ route('employee.users') }}"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="{{ route('employee.demands') }}"><i class="fas fa-file-alt"></i> Demands</a></li>
            <li><a href="{{ route('employee.accounts') }}"><i class="fas fa-user-circle"></i> Accounts</a></li>
            <li class="badr-nav-link nav-link">
                <form action="/logout" method="GET">
                    @csrf
                    <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </form>
            </li>
        </ul>
    </div>



    <div class="content">
        @yield('content-emp')
    </div>

    @yield('scripts')
</body>
</html>
