<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <title>BADR Banque - Banque de l'Agriculture et de Développement Rurale</title>
</head>
<body>
    <header>
        <nav class="nav">
            <ul>
                <li class="nav-list-item" > <a href="#accueil"></a>Accueil</li>
                <li class="nav-list-item" > <a href="#qui-sommes-nous"></a>Qui sommes nous ?</li>
                <li class="nav-list-item" > <a href="#particuliers"></a>Particuliers</li>
                <li class="nav-list-item" > <a href="#services"></a>Services</li>
                <li class="nav-list-item" > <a href="#banque-en-ligne"></a>Banque en ligne</li>
            </ul>
        </nav>
    </header>
    @auth
    <h1>Congrats you are logged in</h1>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    @else
    <h1>you are logged out</h1>
    <form action="/login" method="POST">
        @csrf
        <button><a href="/login">Log in</button>
    </form>
    @endauth
</body>
</html>
