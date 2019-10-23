<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
        </div>
            <div class="partieDroite">
            <nav id="menu">
                <ul>
                    <li><a href="index.php"> Accueil</a></li>
                    <li><a href="apropos.php">À propos </a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>

                </ul>
            </nav>
            <div class=" logoLangue">
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
            </div>

    </header>
    <div class="centrer_bloc">
     <div class="motDePasseOublie">
        <span class="enteteInscription">
          <a> Mot de passe oublié </a>
          
        </span>

        <fieldset>
          <form action="" method="post"> 
          <p>Veuillez indiquer l'adresse e-mail associée à votre compte </p>

          <label for="mail" id="email">Email</label>
          <input type="email" name="mail" id="mail" >
          <br>
          <input type="submit" Value="Valider" name="motDePasseOublie">
          </form>
        </fieldset>
      </div>
    </div>
      <footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.html" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="connexion"><a href="connexion.php" >Connexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>









