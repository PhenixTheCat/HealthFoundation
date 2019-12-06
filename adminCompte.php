<?php
session_start();
include('osQuery.php');
try{
	//connexion à la database
	//Pour les utilisateurs Mac : entrez cette ligne
	//$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
    //Pour windows entrez cette ligne
    
	if (getOS( $_SERVER['HTTP_USER_AGENT'])=='Windows' || getOS( $_SERVER['HTTP_USER_AGENT'])=='Linux')
	{
        $bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');
        $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	elseif (getOS( $_SERVER['HTTP_USER_AGENT'])=='Mac')
	{
        $bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
        $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
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

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
                <img src="Images/HF4.png" class="logo" alt="Logo Health Foundation">
                <h1 ><a href="index.php" class="bigTitle">Health Foundation</a></h1>
            </div>
            <nav <?php  if(!$_SESSION['isConnected']) : ?> class="notConnectedNAV"<?php endif;?>
                 <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> class="connectedNAV"<?php endif;?> 
                 <?php  if($_SESSION['userType'] == "Administrator") : ?> class="adminNAV"<?php endif;?>                                                              
                                                                                id="menu">
                <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> class="connectedrightUL"<?php endif;?>
                    <?php  if($_SESSION['userType']=="Administrator") : ?> class="adminrightUL"<?php endif;?> >
                    <li><a href="index.php"> Accueil</a></li>
                                            <?php //Si l'utilisateur n'est pas un admin
					if($_SESSION['userType'] == "Pilot" || $_SESSION['userType'] == "user") : ?>
                    <li><a href="aPropos.php">À propos </a></li>
                </ul>
                <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?> class="connectedLeftUL"<?php endif;?>>
					<?php endif;
                    if($_SESSION['userType'] == "Instructor") : ?>
                    <li><a href="index.php">Resultats Pilotes</a></li>
                </ul>
                <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> class="connectedLeftUL"<?php endif;?>>
					<?php endif;
                    
					//Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?>
                
                
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
					<?php endif;?>
					
					<?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> 
                    <li><a href="monCompte.php">Mon compte</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
                    <?php endif;?>
                    
                    <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?> 
                    
                    <li><a href="gestionDesUtilisateurs.php">Gestion des utilisateurs</a></li>
                </ul>
                <ul <?php  if($_SESSION['userType'] == "Administrator") : ?> class="adminLeftUL"<?php endif;?> >
                    <li><a href="gestionDesStructures.php">Gestion des structures</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
					<?php endif;?>
                </ul>
				
             
                <div class=" logoLangue">
                    <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                    <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
                </div>
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
 <footer id="footer">
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
	  <script src="script.js"></script>

  </body>
</html>     
