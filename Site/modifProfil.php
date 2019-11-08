<?php

session_start();
try{
	//Détecte l'OS du visiteur pour savoir quelle commande utiliser pour se connecter à la base de donnée
	if (preg_match_all("#Windows NT (.*)[;|\)]#isU", $_SERVER["HTTP_USER_AGENT"], $version))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');
	}
	elseif (preg_match_all("#Mac (.*);#isU", $_SERVER["HTTP_USER_AGENT"], $version))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
	}
}
catch(Exception $error)
{
	die('Erreur lors du chargement de la base de donnée : '.$error->getMessage().' Vérifiez dans le code source les instructions');
}

//Test d'arrivée sur le site du visiteur
if(!isset($_SESSION['isConnected']))
{
	$_SESSION['isConnected'] = false;
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
  <body >

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="aPropos.php">A propos </a></li>
                <?php //Si l'utilisateur n'est pas connecté
				if(!$_SESSION['isConnected']) : ?> 
				
				<li><a href="connexion.php">Connexion</a></li>
				<li><a href="inscription.php">Inscription</a></li>
				<?php endif;?>
				
				<?php //Si l'utilisateur est connecté
				if($_SESSION['isConnected']) : ?> 
				<li><a href="pilote-mon-profil.php"><?php echo 'Mon compte' ?></a></li>
				<li><a href="index.php?deconnexion=true">Se déconnecter</a></li>
				<?php endif;?>

            </ul>

            </nav>

</header>
   
    <div class="centrer_bloc">
    <div class="headerContact">
    <h1 > Mon compte </h1>
     
  
  

    <div class="piloteModifMdpp">  
           
            <fieldset>
            <form action="piloteModifMdp.html"  method="post"> 
            <h3> Informations détaillés </h3>
            <label for="nom" id="nom">Nom  </label>
            <input type="text" name="nom" id="nom">
            <br>
            <label for="prenom" id="prenom">Prénom </label>
            <input type="text" name="prenom" id="prenom">
            <br>
            <label for="date" id="date">Date de naissance </label>
            <input type="date" name="date" id="date">
            <br>
            <label for="nomUtilisateur" id="nomUtilisateur">Nom d'utilisateur </label>
            <input type="text" name="nomUtilisateur" id="nomUtilisateur">
            <br>
            <label for="mail" id="email">Adresse email</label>
            <input type="email" name="mail" id="mail" >
            <br>
            <label for="adressePostale" id="adressePostale">Adresse postale</label>
            <input type="text" name="adressePostale" id="adressePostale">
            <br>
            <label for="codePostal" id="codePostal">Code postal</label>
            <input type="string" name="codePostale" id="codePostale">
            <br>
            <label for="pays" id="pays">Pays </label>
            <input type="text" name="pays" id="pays">
            <br>
            <label for="numeroDeTelephone" id="numeroDeTelephone">Numéro de téléphone</label>
            <input type="string" name="numeroDeTelephone" id="numeroDeTelephone">
            <br>

            <input type="submit" Value="Enregistrer" name="piloteModifMdpp" > 
        </form>
        </fieldset>
      </div>
  </div>
  </div>
 <footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
				<?php //Si l'utilisateur n'est pas connecté
				if(!$_SESSION['isConnected']) : ?> 
				<div id="footerButton"><a href="inscription.php" >S'inscrire</a></div>
				<?php endif;?>
				
				<?php //Si l'utilisateur est connecté
				if($_SESSION['isConnected']) : ?> 
				<div id="footerButton"><a href="index.php?deconnexion=true.php" >Déconnexion</a></div>
				<?php endif;?>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>     

