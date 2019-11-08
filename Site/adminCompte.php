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

$requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
$requser->execute(array($_SESSION['userID']));
$user = $requser->fetch();
if($_SESSION['isConnected'])
{
	//On recherche les prenoms et noms si l'utilisateur est connecté
	$requetePrenom = $bdd->query('SELECT first_name FROM user WHERE id = \''.$_SESSION['userID'].'\'');
	if($donneePrenom = $requetePrenom->fetch())
	{
		$prenom = $donneePrenom['first_name'];
	}
	else
	{
		echo 'Erreur, utilisateur inexistant';
	}
	
	$requeteNom = $bdd->query('SELECT last_name FROM user WHERE id = \''.$_SESSION['userID'].'\'');
	if($donneeNom = $requeteNom->fetch())
	{
		$nom = $donneeNom['last_name'];
	}
	else
	{
		echo 'Erreur, utilisateur inexistant';
  }
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

    <header class="headerConnecte" >
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
     
  
  

    <div class="adminCp">  
           
           // On récupère tout le contenu de la table user 
           <?php  
           
           $reponse = $bdd->query('SELECT * FROM user');
           // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch())  
            {    
           ?>
           
            <form action=""  method="post"> 
            <h3> Informations détaillés </h3>

            <h4> Nom </h4>
            <h5> <?php echo $coordonnees['last_name'];?></h5>
            <h4> Prénom </h4>
            <h5> <?php echo $coordonnees['first_name'];?></h5>
            <h4> Date de naissance </h4>
            <h5><?php echo $coordonnees['birthdate'];?></h5>
            <h4> Adresse email</h4>
            <h5><?php echo $coordonnees['email'];?></h5>
            <h4> Mot de passe </h4>



            <a class = "lien" href="admin-modif-mdp.php">Modifier le mot de passe  </a>
            <a class= "lien" href="admin-modif-profil-perso.php"> Modifier le profil</a>
            <?php
                }
                    $reponse->closeCursor(); // Termine le traitement de la requête
            ?>


             

        </form>
       
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

