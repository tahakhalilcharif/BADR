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
            <!-- 
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom" placeholder="Nom" required><br>
        
            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required><br>
        
            <label for="age">Age</label><br>
            <input type="number" name="age" id="age" placeholder="Age" min="0" max="100" required><br>
        
            <label for="numero_telephone">Numero de Telephone</label><br>
            <input type="number" name="numero_telephone" id="numero_telephone" placeholder="Numero Téléphone" required><br>
        
            <label for="adresse">Adresse</label><br>
            <input type="text" name="adresse" id="adresse" placeholder="Adresse" required><br>
        
            <label for="select_wilaya">Wilaya</label><br>
            <select id="select_wilaya" style="width: 200px; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;" required>
                <option value="">Select a Wilaya</option>
                <option value="Adrar">Wilaya d'Adrar</option>
                <option value="Chlef">Wilaya de Chlef</option>
                <option value="Laghouat">Wilaya de Laghouat</option>
                <option value="Oum El Bouaghi">Wilaya d'Oum El Bouaghi</option>
                <option value="Batna">Wilaya de Batna</option>
                <option value="Béjaïa">Wilaya de Béjaïa</option>
                <option value="Biskra">Wilaya de Biskra</option>
                <option value="Béchar">Wilaya de Béchar</option>
                <option value="Blida">Wilaya de Blida</option>
                <option value="Bouira">Wilaya de Bouira</option>
                <option value="Tamanrasset">Wilaya de Tamanrasset</option>
                <option value="Tébessa">Wilaya de Tébessa</option>
                <option value="Tlemcen">Wilaya de Tlemcen</option>
                <option value="Tiaret">Wilaya de Tiaret</option>
                <option value="Tizi-Ouzou">Wilaya de Tizi-Ouzou</option>
                <option value="Alger">Wilaya d'Alger</option>
                <option value="Djelfa">Wilaya de Djelfa</option>
                <option value="Jijel">Wilaya de Jijel</option>
                <option value="Sétif">Wilaya de Sétif</option>
                <option value="Saida">Wilaya de Saida</option>
                <option value="Skikda">Wilaya de Skikda</option>
                <option value="Sidi Bel Abbès">Wilaya de Sidi-Bel-Abbès</option>
                <option value="Annaba">Wilaya d'Annaba</option>
                <option value="Guelma">Wilaya de Guelma</option>
                <option value="Constantine">Wilaya de Constantine</option>
                <option value="Médéa">Wilaya de Médéa</option>
                <option value="Mostaganem">Wilaya de Mostaganem</option>
                <option value="M'Sila">Wilaya de M'Sila</option>
                <option value="Mascara">Wilaya de Mascara</option>
                <option value="Ouargla">Wilaya d'Ouargla</option>
                <option value="Oran">Wilaya d'Oran</option>
                <option value="El Bayadh">Wilaya d'El-Bayadh</option>
                <option value="Illizi">Wilaya d'Illizi</option>
                <option value="Bordj Bou Arreridj">Wilaya de Bordj-Bou-Arreridj</option>
                <option value="Boumerdès">Wilaya de Boumerdès</option>
                <option value="El Tarf">Wilaya d'El-Tarf</option>
                <option value="Tindouf">Wilaya de Tindouf</option>
                <option value="Tissemsilt">Wilaya de Tissemsilt</option>
                <option value="El Oued">Wilaya d'El-Oued</option>
                <option value="Khenchela">Wilaya de Khenchela</option>
                <option value="Souk Ahras">Wilaya de Souk-Ahras</option>
                <option value="Tipaza">Wilaya de Tipaza</option>
                <option value="Mila">Wilaya de Mila</option>
                <option value="Aïn Defla">Wilaya de Aïn-Defla</option>
                <option value="Naâma">Wilaya de Naâma</option>
                <option value="Aïn Témouchent">Wilaya de Aïn-Témouchent</option>
                <option value="Ghardaïa">Wilaya de Ghardaia</option>
                <option value="Relizane">Wilaya de Relizane</option>
                <option value="Timimoun">Wilaya de Timimoun</option>
                <option value="Bordj Badji Mokhtar">Wilaya de Bordj Badji Mokhtar</option>
                <option value="Ouled Djellal">Wilaya d'Ouled Djellal</option>
                <option value="Béni Abbès">Wilaya de Béni Abbès</option>
                <option value="In Salah">Wilaya d'In Salah</option>
                <option value="In Guezzam">Wilaya d'In Guezzam</option>
                <option value="Touggourt">Wilaya de Touggourt</option>
                <option value="Djanet">Wilaya de Djanet</option>
                <option value="El M'Ghair">Wilaya d'El M'Ghair</option>
                <option value="El Meniaa">Wilaya d'El Meniaa</option>
            </select><br>

            <label for="daira">Daira</label><br>
            <input type="text" name="daira" id="daira" placeholder="Daira" required><br>
        
            <label for="commune">Commune</label><br>
            <input type="text" name="commune" id="commune" placeholder="Commune" required><br>
            -->
            <button>Envoi</button>
        </form>
    </div>

    <div style = "border: 2px solid rgb(14, 110, 38);">
        <h2>Log in</h2>
        <form action="/login" method="POST">
            @csrf
            <label for="login_nom_dutilisateur">Nom d'utilisateur</label><br>
            <input type="text" name="login_nom_dutilisateur" id="login_nom_dutilisateur" placeholder="Nom d'utilisateur" required><br>
        
            <label for="login_mot_de_passe">Mot de passe</label><br>
            <input type="password" name="login_mot_de_passe" id="login_mot_de_passe" placeholder="Mot de passe" required><br>
            <button>Log in</button>
        </form>
    </div>
</body>
</html>