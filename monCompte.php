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
//Test si l'utilisateur veut se déconnecter
if(isset($_GET['deconnexion']))
{
	$_SESSION['isConnected'] = false;
	header('Location:index.php');
	exit();
}

//Test d'arrivée sur le site du visiteur
if(!isset($_SESSION['isConnected']))
{
	$_SESSION['isConnected'] = false;
}

if(isset($_SESSION['userID'])){
    $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
    $requser->execute(array($_SESSION['userID']));
    $user = $requser->fetch();
  }

?>
<!DOCTYPE html>
<html class="decorFond">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" href="design.css" />
        <title>Healthfoundation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="pasImage">
        
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


    <div class ="headerContact">
        <h1>Mon compte</h1>
    </div>

    <div class="moncompteblochaut">   
        <div class="infoUtilisateur">
              
                <h3> Informations détaillés </h3>
                <a class= "lien" href="modifProfil.php"> Modifier le profil</a>
                <h4> Nom </h4>
                <h5> <?php echo $user['last_name'];?></h5>
                <h4> Prénom </h4>
                <h5> <?php echo $user['first_name'];?></h5>
                <h4> Date de naissance </h4>
                <h5><?php echo $user['birthdate'];?></h5>
                <h4> Adresse email</h4>
                <h5><?php echo $user['email'];?></h5>
                <h4> Mot de passe </h4>

                <a class = "lien" href="modifMotDePasse.php">Modifier le mot de passe  </a>

        </div>

        <div class="resumeResultat">
        <h3> Résumé des resultats </h3>
            <h1><a href="resultatsGlobaux.php">Résultats </a></h1>
            <p>Description</p>
        </div>

      </div>
<div class="resultatsParCat">
<h3> Resultats détaillés </h3>
      <div id ="gestionDuStress">
          <h1><a href="resultatsGestionDuStress.php">Gestion du stress</a></h1>
          <p>Description</p>
        </div>
        <div id="reconnaissanceDeTonalite">
        <h1><a href="resultatsReconnaissanceDeTonalite.php">Reconnaissance de tonalité</a></h1>
        <p>Description</p>
        </div>

        <div id="tempsDeReaction">
        
            <h1><a href="resultatsTempsDeReaction.php">Temps de réaction</a></h1>
            <p>Description</p>

        </div>

        <div id="seuilDePerception">
            <h1><a href="resultatSeuilsDePerception.php">Seuil de perception</a></h1>
            <p>Description</p>

        </div>
    </div>
    <div id="resultatstestenligne">
    <h3> Resultats test en ligne </h3>
    <div id="resultatenligne">
        <h1><a href="resultats.php">Résultats</a></h1>
        <p>Description</p>
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
