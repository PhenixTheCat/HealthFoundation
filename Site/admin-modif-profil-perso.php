<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body >

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="accueil.html">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                <li><a href="accueil.html"> Accueil</a></li>
                <li><a href="apropos.html">A propos </a></li>
                <li><a href="accueil.html">Déconnexion</a></li>
                <li><a href="inscription.html">Inscription</a></li>

            </ul>

            </nav>

</header>
   
    <div class="centrer_bloc">
    <div class="headerContact">
    <h1 > Mon compte </h1>
     
  
  

    <div class="adminModifpp">  
          
          <fieldset>
          <form action="admin-compte-perso.html" method="post"> 
          <h4> Participant </h4>
          <label for="nom" id="nom">Nom </label>
          <input type="text" name="nom" id="nom">
          <br>
          <label for="prenom" id="prenom">Prénom </label>
          <input type="text" name="prenom" id="prenom">
          <br>
          <label for="date" id="date">Date de naissance  </label>
          <input type="date" name="date" id="date">
          <br>
          <label for="nomUtilisateur" id="nomUtilisateur">Nom d'utilisateur</label>
          <input type="text" name="nomUtilisateur" id="nomUtilisateur">
          <br>
          <label for="adressePostale" id="adressePostale">Adresse postale</label>
          <input type="text" name="adressePostale" id="adressePostale">
          <br>
          <label for="codePostal" id="codePostal">Code postal </label>
          <input type="string" name="codePostale" id="codePostale">
          <br>
          <label for="pays" id="pays">Pays </label>
          <input type="text" name="pays" id="pays">
          <br>
          <label for="numeroDeTelephone" id="numeroDeTelephone">Numéro de téléphone</label>
          <input type="string" name="numeroDeTelephone" id="numeroDeTelephone">
          <br>

          <input type="submit" Value="Enregistrer" name="adminModifpp"> 
        
        </fieldset>
            
            


            

        </form>
        
      </div>
  </div>
  </div>
 <footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.html" target="_blank"> CGU</a>
                <a href="faq.html"> FAQ/Aide</a>
                <a href="contact.html"> Contact</a>
                <div id="deconnexion"><a href="accueil.html" >Déconnexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>     
