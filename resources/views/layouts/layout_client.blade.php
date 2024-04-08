<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="nav">
            <ul>
                <li class="nav-list-item" ><a href="#home">Home</a></li>
                <li class="nav-list-item" ><a href="#products">Products</a></li>
                <li class="nav-list-item" ><a href="#services">Services</a></li>
                <li class="nav-list-item" ><a href="#my_information">My Information</a></li>
            </ul>
        </nav>
    </header>
    @auth
    <div class="container">
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>
        @yield('content')
    </div>
    @else
    <form action="/login" method="POST">
        @csrf
        <button><a href="/login">Log in</a></button>
    </form>
    @endauth

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Banque de l'agriculture et du développement rural</h3>
            </div>
            <div class="footer-section">
                <h3>Conditions de banque</h3>
                <ul>
                    <li><a href="#">Pour particuliers</a></li>
                    <li><a href="#">Pour entreprises</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <ul>
                    <li><a href="mailto:contact@badr.dz">E-Mail: contact@badr.dz</a></li>
                    <li>Adresse: Siège social 17, Bd Colonel Amirouche, B.P 484, Alger.</li>
                    <li>Call centrer: +213 (0)21 989 323</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Copyrights BADR BANK by Digital Ways</p>
        </div>
    </footer>

</body>
</html>
