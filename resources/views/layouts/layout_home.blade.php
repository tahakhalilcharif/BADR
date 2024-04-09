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
    @auth
        <header>
            <nav class="nav">
                <ul>
                    <li class="nav-list-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="nav-list-item"><a href="{{ route('products') }}">Products</a></li>
                    <li class="nav-list-item"><a href="{{ route('services') }}">Services</a></li>
                    <li class="nav-list-item"><a href="{{ route('compte.info_client') }}">My Information</a></li>
                    <li class="nav-list-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button >Log out</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
    @else
        <header>
            <nav class="nav">
                <ul>
                    <li class="nav-list-item" > <a href="{{ route('home') }}"></a>Accueil</li>
                    <li class="nav-list-item" > <a href="{{ route('qui-sommes-nous') }}"></a>Qui sommes nous ?</li>
                    <li class="nav-list-item" > <a href="{{ route('particuliers') }}"></a>Particuliers</li>
                    <li class="nav-list-item" > <a href="{{ route('services') }}"></a>Services</li>
                    <li class="nav-list-item" > <a href="{{ route('banque-en-ligne') }}"></a>Banque en ligne</li>
                </ul>
            </nav>
        </header>
    @endauth
    
    <div class="container">
        @yield('content')
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Banque de l'agriculture et du développement rural</h3>
                <p>
                    بنط الفلاحة و التنمية الريفية<br>
                    Abonnez-vous pour recevoir nos nouvelles<br>
                    Votre Mail<br>
                    OK
                </p>
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
