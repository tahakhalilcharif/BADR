<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>BADR BANQUE &#8211; Banque de l’Agriculture et du Développement Rural</title>
    
  </head>
  <body>
    <div class="container">
       <div class="box form-box">
        <header>BADR BANQUE</header>
        <div class="logo">
          <img src=" https://upload.wikimedia.org/wikipedia/fr/5/5c/Banque_de_l%E2%80%99agriculture_et_du_d%C3%A9veloppement_rural.svg">
          </div>
        
          <form action="/login" method="POST">
            @csrf
            <div class="field input">
                <label for="log_in_email">E-mail</label><br>
                <input type="email" name="log_in_email" id="log_in_email" placeholder="E-mail" required><br>
            </div>

            <div class="field input">
                <label for="login_mot_de_passe">Mot de passe</label><br>
                <input type="password" name="login_mot_de_passe" id="login_mot_de_passe" placeholder="Mot de passe" required><br>
            </div>

            <div class="field">
                <input type="submit"  class="btn" name="submit" value="s'identifier" required>
            </div>
            
            <div class="links">
                <p>Creer un nouveau compte? <a href="/inscription">Inscrire</a></p>
            </div>

        </form>
      </div> 
    </div>
  </body>
</html>
