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
                <li><a href="accueil.php">Déconnexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>

            </ul>

            </nav>

</header>
    <div class="centrer_bloc">
    <div class="headerContact">
    <h1 > Mon compte </h1>
  

    <div class="adminModiMdp">    
            <fieldset>
            <form action=""  method="post"> 
            <h3> Modification du mot de passe </h3>
            
            <label for="Nmdp" id="Nmdp">Nouveau mot de passe </label>
            <input type="password" name="Nmdp" id="Nmdp">
            <br>
            <label for="Cmdp" id="Cmdp">Confirmer votre mot de passe </label>
            <input type="password" name="Cmdp" id="Cmdp">
            <br>

            <input type="submit" Value="Enregistrer" name="adminModifMdp" > 
        </form>
        </fieldset>
      </div>
      </div>
  </div>
 

      
<footer class="footerBloque">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <li><a href="accueil.php">Déconnexion</a></li>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>
