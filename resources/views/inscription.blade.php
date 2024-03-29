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
    @else
    <div style = "border: 2px solid rgb(14, 110, 38);">
        <h2>Inscription</h2>
        <form action="/inscrire" method="post">
            @csrf
            <label for="nom_dutilisateur">Nom d'utilisateur</label><br>
            <input type="text" name="nom_dutilisateur" id="nom_dutilisateur" placeholder="Nom d'utilisateur" required><br>
        
            <label for="mot_de_passe">Mot de passe</label><br>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required><br>
        
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="E-mail" required><br>
    
            
            <button>Envoi</button>
        </form>
    </div>
    @endauth
</body>

</html>