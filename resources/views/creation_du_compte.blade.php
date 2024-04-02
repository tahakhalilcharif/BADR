@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
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
    <form action="/open_account" method="POST">
        @csrf
        <div>
            <label for="classe">Classe:</label>
            <select name="classe" id="classe">
                <option value="201">201</option>
                <option value="202">202</option>
                <option value="300">300</option>
                <option value="390">390</option>
                <option value="397">397</option>
                <option value="398">398</option>
            </select>
        </div>
        <div>
            <label for="agence">Agence:</label>
            <input type="number" id="agence" name="agence" required pattern="\d{5}" title="Please enter a 5-digit number">
        </div>
        <button type="submit">Open Account</button>
    </form>
</body>
</html>
@endauth