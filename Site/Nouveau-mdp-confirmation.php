<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body class= "allPage">

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
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
    <div class="centrer_bloc">
    <div class="nouveauMdpc">
        <span>
          <a class="enteteNouveauMdpc"> Nouveau mot de passe </a>
          
        </span>
           
            <fieldset>
            <form action="index.php"  method="post"> 
             <h3> Votre mot de passe a bien été enregistré </h3>

            <input type="submit" Value="Retour à l'accueil" name="nouveauMdpc"> 
        </form>
        </fieldset>
      </div>
  </div>
      
<footer class="footerBloque">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="connexion"><a href="connexion.php" >Connexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>
