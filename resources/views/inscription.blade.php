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
    @auth
    @else
    <div style="border: 2px solid rgb(14, 110, 38);">
        <h2>Inscription</h2>
        <form action="/inscrire" method="post" id="registration-form">
            @csrf
            <label for="nom_dutilisateur">Nom d'utilisateur</label><br>
            <input type="text" name="nom_dutilisateur" id="nom_dutilisateur" placeholder="Username" required><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="E-mail" required><br>

            <label for="mot_de_passe">Mot de passe</label><br>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Password" required><br>

            <label for="password_confirmation">Confirm Password:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onkeyup="validatePassword()"><br>
            <span id="password-message"></span>

            <button id="submit-btn">Envoi</button>
        </form>
    </div>
    @endauth



    <script>
        function validatePassword() {
            var password = document.getElementById("mot_de_passe").value;
            var confirm_password = document.getElementById("password_confirmation").value;
            var message = document.getElementById("password-message");

            if (password === confirm_password) {
                message.innerHTML = "Les mots de passe correspondent";
                message.style.color = "green";
                document.getElementById("submit-btn").disabled = false;
            } else {
                message.innerHTML = "Les mots de passe ne correspondent pas";
                message.style.color = "red";
                document.getElementById("submit-btn").disabled = true;
            }
        }
    </script>
</body>

</html>
