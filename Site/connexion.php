<?php

session_start();
try{
	//connexion à la database
	//Pour les utilisateurs Mac : entrez cette ligne
	//$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
	//Pour windows entrez cette ligne
	$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');
}
catch(Exception $error)
{
	die('Erreur lors du chargement de la base de donnée : '.$error->getMessage().' Vérifiez dans le code source les instructions');
}

if(isset($_POST['Connexion'])) {
	
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = htmlspecialchars($_POST['mdp']);
	//On vérifie si le mail et le mdp correspondent
	$requete = $bdd->query('SELECT id FROM user WHERE email=\''.$mail.'\' AND password =\''.$mdp.'\'');
	if($donnee = $requete->fetch())
	{
		$_SESSION['isConnected'] = true;
		$_SESSION['userID'] = $donnee['id'];
		header('Location:index.php');
	}
	else
	{
		$erreur = "L'email et le mot de passe ne correspondent pas";
	}
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   
  
  
  /*!!!!!!! ajouter ici la référence du header et bas de page connecté*/
  
  
  
  
  
} else {
     /*!!!!!!! ajouter ici la référence du header et bas de page déconnecté*/
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
                    <li><a href="aPropos.php">À propos </a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>

                </ul>
            </nav>
            <div class=" logoLangue">
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
            </div>
      </header>
    <div class="centrer_bloc">
     <div class="Connexion">
        <span>
		<?php
         if(isset($erreur)) {
            echo '<font color="black">'.$erreur."</font>";
         }
         ?>
          <a class="enteteInscription" href="connexion.php"> Connexion </a>
          <a class="enteteInscription" href="inscription.php"> Inscription </a>
        </span>
         
          <fieldset>
          <form action="" method="post"> 
          
          <label for="mail" id="email">Email</label>
          <input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" >
          <br>
          <label for="mdp">Mot de passe</label>
          <input type="password" name="mdp" id="mdp">
          <br>
          <input type="submit" Value="Suivant" name="Connexion">
        </form>
        </fieldset>
        <a id= mdp href="mot-de-passe-oublié.php">Mot de passe oublié</a>
      </div>
    </div>
<footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="connexion"><a href="connexion.php" >Connexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>
