<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="/nv_client" method="POST">
            @csrf
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom" placeholder="Nom" required><br>
        
            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required><br>

            <label for="sexe">Sexe</label><br>
            <select name="sexe" id="sexe" placeholder="Sexe">
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select><br>

            <label for="date_n">Date de Naissance</label><br>
            <input type="date" name="date_n" id="date_n" placeholder="Date de Naissance"required><br>
        
            <label for="lieu_n">Lieu de Naissance</label><br>
            <input type="text" name="lieu_n" id="lieu_n" placeholder="Lieu de Naissance" required><br>
        
            <label for="numero_telephone">Numero de Telephone</label><br>
            <input type="number" name="numero_telephone" id="numero_telephone" placeholder="Numero Téléphone" required><br>
        
            <label for="adresse">Adresse</label><br>
            <input type="text" name="adresse" id="adresse" placeholder="Adresse" required><br>
        
            <label for="select_wilaya">Wilaya</label><br>
            <select name="select_wilaya" id="select_wilaya" required>
                <option value="">Select a Wilaya</option>
                @foreach ($wilayas as $wilaya)
                    <option value="{{ $wilaya->wilaya }}">{{ $wilaya->wilaya }}</option>
                @endforeach
            </select><br>

            <label for="daira">Daira</label><br>
            <input type="text" name="daira" id="daira" placeholder="Daira" required><br>
        
            <label for="commune">Commune</label><br>
            <input type="text" name="commune" id="commune" placeholder="Commune" required><br>
            
            <label for="categorie">Catégorie:</label><br>
            <select id="categorie" name="categorie" required>
                <option value="Personne Physique">Personne Physique</option>
                <option value="Personne Morale">Personne Morale</option>
            </select><br>

            <label for="statut">Statut:</label><br>
            <select id="statut" name="statut" required>
                <option value="vivant">Vivant</option>
                <option value="mort">Mort</option>
            </select><br>

            <button>Envoi</button>
        </form>
    </div>
 </body>
</html>