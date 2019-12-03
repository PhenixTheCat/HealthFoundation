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


if(isset($_POST['inscriptionP1'])) {
   $mail = htmlspecialchars($_POST['mail']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   $codeformateur = htmlspecialchars($_POST['codeFormateur']);
   if(!empty($_POST['mail']) AND !empty($_POST['codeFormateur']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM user WHERE email = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
			//Inscription d'un formateur avec un code structure
                    	$requete = $bdd->query("SELECT * FROM structure WHERE code = '".$codeformateur."'");
                   	if($donnee = $requete->fetch()){
							$_SESSION['signupCodeType'] = "structure";
							$_SESSION['signupMail'] = $mail;
                       		$_SESSION['signupPassword'] = $mdp;
							$erreur = header('Location:inscriptionSuite.php');
                    }
                   	
					// Inscription d'un pilote avec code formateur
					$requeteCodeFormateur = $bdd->query('SELECT * FROM user  WHERE code=\''.$codeformateur.'\'');
					if($donneeCodeFormateur = $requeteCodeFormateur->fetch())
					{
						$_SESSION['signupCodeType'] = "instructor";
						$_SESSION['signupMail'] = $mail;
                       	$_SESSION['signupPassword'] = $mdp;
						$erreur = header('Location:inscriptionSuite.php');
							
					}
					else
					{
                        $erreur = "Le code formateur est invalide";
                    }
				
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            }else {
               $erreur = "Votre adresse mail n'est pas valide !";
                } 
            } else {
      $erreur = "Tous les champs doivent être complétés !";
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
  <body>

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
                <img src="Images/HF4.png" class="logo" alt="Logo Health Foundation">
                <h1 ><a href="index.php" class="bigTitle">Health Foundation</a></h1>
            </div>
            <nav <?php  if(!$_SESSION['isConnected']) : ?> class="notConnectedNAV"<?php endif;?>
                 <?php  if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> class="connectedNAV"<?php endif;?> 
                 <?php  if($_SESSION['admin']) : ?> class="adminNAV"<?php endif;?>                                                              
                                                                                id="menu">
                <ul <?php  if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> class="connectedrightUL"<?php endif;?>
                    <?php  if($_SESSION['admin']) : ?> class="adminrightUL"<?php endif;?> >
                    <li><a href="index.php"> Accueil</a></li>
                                            <?php //Si l'utilisateur n'est pas un admin
					if(!$_SESSION['admin']) : ?>
                    <li><a href="aPropos.php">À propos </a></li>
                </ul>
                <ul <?php  if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> class="connectedLeftUL"<?php endif;?>>
					<?php endif;
                                            //Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?>
                
                
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
					<?php endif;?>
					
					<?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> 
                    <li><a href="monCompte.php">Mon compte</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
                    <?php endif;?>
                    
                    <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['admin']) : ?> 
                    
                    <li><a href="gestionUtilisateur.php">Gestion des utilisateurs</a></li>
                </ul>
                <ul <?php  if($_SESSION['admin']) : ?> class="adminLeftUL"<?php endif;?> >
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
     <div class="inscriptionP1">
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
          <input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
          <br>
          <label for="mdp">Mot de passe</label>
          <input type="password" name="mdp" id="mdp">
          <br>
          <label for="mdp2">Confirmation du mot de passe</label>
          <input type="password" name="mdp2" id="mdp2">
          <br>
          <label for="codeFormateur">Code formateur</label>
          <input type="text" name="codeFormateur" id="codeFormateur" value="<?php if(isset($_POST['codeFormateur'])) { echo $_POST['codeFormateur']; } ?>">
          <br>
          <input class="submitButtons" type="submit" Value="Suivant" name="inscriptionP1">
        </form>
        </fieldset>

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
