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
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="aPropos.php">A propos </a></li>
                <li><a href="inscription.php">Déconnexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            </ul>
            </nav>
      </header>
<div class="headerContact">
    <h1 > Contact </h1>
  </div>
    
    <div class="confirmationContact">  
      <p>Votre message a bien été envoyé! <br> Vous recevrez une réponse dans 
        les plus bref délais. </p>
        <a href="index.php"> Retourner à l'accueil</a>
  </div> 
  <footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="deconnexion"><a href="index.php" >Déconnexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>
  </body>
</html>
