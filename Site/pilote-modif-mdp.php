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
        <h1 id="Titre"><a href="index.html">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                <li><a href="index.html"> Accueil</a></li>
                <li><a href="apropos.html">A propos </a></li>
                <li><a href="index.html">Déconnexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>

            </ul>

            </nav>

</header>
    <div class="centrer_bloc">
    <div class="headerContact">
    <h1 > Mon compte </h1>
  

    <div class="piloteModiMdp">    
            <fieldset>
            <form action=""  method="post"> 
            <h4> Modification du mot de passe </h4>
            <label for="Amdp" id="Amdp">Ancien mot de passe </label>
            <input type="password" name="Amdp" id="Amdp">
            <br>
             <label for="Nmdp" id="Nmdp">Nouveau mot de passe </label>
            <input type="password" name="Nmdp" id="Nmdp">
            <br>
            <label for="Cmdp" id="Cmdp">Confirmer votre mot de passe </label>
            <input type="password" name="Cmdp" id="Cmdp">
            <br>

            <input type="submit" Value="Enregistrer" name="piloteModifMdp" > 
        </form>
        </fieldset>
      </div>
      </div>
  </div>
 

      
<footer class="footerBloque">
            <div class="menuBas">
                <a href="cgu.html" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="deconnexion"><a href="index.html" >Déconnexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>
