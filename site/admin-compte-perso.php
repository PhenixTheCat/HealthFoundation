
<?php

session_start();
try{
	//connexion à la database
	//Pour les utilisateurs Mac : entrez cette ligne
	$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
	//Pour windows entrez cette ligne
	//$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');
}
catch(Exception $error)
{
	die('Erreur lors du chargement de la base de donnée : '.$error->getMessage().' Vérifiez dans le code source les instructions');
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
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" href="design.css" />
        <title>Healthfoundation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    	<header class="headerNonConnecte" >
            <div class = logoPrincipal >
                <img src="Images/HF4.png" class="logo" alt="Logo Health Foundation">
                <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
            </div>
            <nav id="menu">
                <ul>
                    <li><a href="indexAdministrator.php"> Accueil</a></li>
                    <li><a href="gestionUtilisateur.php">Gestion des utilisateurs </a></li>
                    <li><a href="admin-compte-perso.php">Mon compte</a></li>
                    <li><a href="deconnexion.php">Se déconnecter</a></li>

                </ul>
             
            </nav>
            <div class=" logoLangue">
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
    	</header>
   
    <div class="centrer_bloc">
    <div class="headerContact">
    <h1 > Mon compte </h1>
     
  
  

    <div class="adminCp">  
           
           
            <form action=""  method="post"> 
            <h3> Informations détaillés </h3>

            <h4> Nom </h4>
            <h5> <?php echo $user['last_name']; ?></h5>
            <h4> Prénom </h4>
            <h5> <?php echo $user['first_name']; ?></h5>
            <h4> Date de naissance </h4>
            <h5> <?php echo $user['birthdate']; ?></h5>
            <h4> Adresse email</h4>
            <h5> <?php echo $user['email']; ?></h5>
            <a class = "lien" href="admin-modif-mdp.php">Modifier le mot de passe  </a>
            <a class= "lien" href="admin-modif-profil-perso.php"> Modifier le profil</a>



             

        </form>
       
      </div>
  </div>
  </div>
 <footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="deconnexion"><a href="accueil.php" >Déconnexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>     

