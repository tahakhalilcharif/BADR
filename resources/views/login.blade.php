<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In - BADR</title>
</head>
<body>
    @auth
    @else
    <div style = "border: 2px solid rgb(14, 110, 38);">
        <h2>Log in</h2>
        <form action="/login" method="POST">
            @csrf
            <label for="log_in_email">E-mail</label><br>
            <input type="email" name="log_in_email" id="log_in_email" placeholder="E-mail" required><br>
        
            <label for="login_mot_de_passe">Mot de passe</label><br>
            <input type="password" name="login_mot_de_passe" id="login_mot_de_passe" placeholder="Mot de passe" required><br>
            <button>Log in</button>
            <p>Creer un nouveau compte? <a href="/inscription">Inscrire</a></p>
        </form>
    </div>
    @endauth
</body>
</html>