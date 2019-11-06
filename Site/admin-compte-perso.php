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
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body >

    <header class="headerConnecte" >
            <div class = logoPrincipal >
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="accueil.html">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="apropos.php">A propos </a></li>
                <li><a href="index.php">Déconnexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>

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
                <div id="deconnexion"><a href="index.php" >Déconnexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>     

