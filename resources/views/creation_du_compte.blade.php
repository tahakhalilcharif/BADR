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
            <label for="classe">Select Class:</label>
            <select name="classe" id="classe">
                @foreach ($classes as $classe)
                    <option value="{{ $classe->classe }}">{{ $classe->label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="agence">Agence:</label>
            <select name="agence" id="agence" required>
                @foreach ($agences as $agence)
                    <option value="{{ $agence->code_agence }}">{{ $agence->nom_agence }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Open Account</button>
    </form>
</body>
</html>
@endauth