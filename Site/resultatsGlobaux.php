<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   
  
  
  /*!!!!!!! ajouter ici la référence du header et bas de page connecté*/
  
  
  
  
  
} else {
     /*!!!!!!! ajouter ici la référence du header et bas de page déconnecté*/
}


?>

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
        <img src="HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="accueil.html">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                    <li><a href="index.php"> Accueil</a></li>
              <li><a href="apropos.php">A propos </a></li>
              <li><a href="connexion.php">Connexion</a></li>
              <li><a href="inscription.php">Inscription</a></li>

            </ul>

            </nav>

    </header>


    <div class ="RésultatsGlobaux">
    <span class = "Résultats globaux">
      <h1>Résultats globaux</h1>
    </span>
    </div>




    <footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="connexion"><a href="connexion.php" >Connexion</a></div> // je pense qu'il faut modifier ça avec du php
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
      </footer>

  </body>
</html>
