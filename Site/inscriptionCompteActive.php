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

if(!isset($_GET["code"])){
    exit(header("Location:404.php"));
  }
  $code=$_GET["code"];

  $reqcode = $bdd->prepare('UPDATE user SET status =? WHERE  validation_key =?');
$reqcode ->execute(array("A",$code));

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
            <div class="partieDroite">
            <nav id="menu">
                <ul>
                    <li><a href="index.php"> Accueil</a></li>
                    <li><a href="apropos.php">À propos </a></li>
                    <?php //Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?> 
					
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
					<?php endif;?>
					
					<?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']) : ?> 
                    <li><a href="monCompte.php"><?php echo 'Mon compte' ?></a></li>
                    <li><a href="index.php?deconnexion=true">Se déconnecter</a></li>
					<?php endif;?>

                </ul>
            </nav>
            <div class=" logoLangue">
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
            </div>

</header>
<div class="centrer_bloc">
<div class="confirmationInscription">
        <h2>Confirmation de création de compte </h2>
    <p>Votre compte à été validé . </p>
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
			<?php endif;?>            <p>©Copyright Health Foundation, tout droits réservés</p>
        </div>
    </footer>
	<script src="script.js"></script>


</body>
</html>
