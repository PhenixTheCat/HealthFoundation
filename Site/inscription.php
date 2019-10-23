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
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
            </div>

      </header>
    <div class="centrer_bloc">
     <div class="inscriptionP1">
        <span>
          <a class="enteteInscription" href="connexion.php"> Connexion </a>
          <a class="enteteInscription" href="inscription.php"> Inscription </a>
        </span>
         
          <fieldset>
          <form action="" method="post"> 
          
          <label for="mail" id="email">Email</label>
          <input type="email" name="mail" id="mail" >
          <br>
          <label for="mdp">Mot de passe</label>
          <input type="password" name="mdp" id="mdp">
          <br>
          <label for="mdp2">Confirmation du mot de passe</label>
          <input type="password" name="mdp2" id="mdp2">
          <br>
          <label for="codeFormateur">Code formateur</label>
          <input type="text" name="codeFormateur" id="codeFormateur">
          <br>
          <input type="submit" Value="Suivant" name="inscriptionP1">
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
