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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Test d'arrivée sur le site du visiteur
if(!isset($_SESSION['isConnected']))
{
	$_SESSION['isConnected'] = false;
}

//Test d'arrivée sur le site du visiteur
if(!isset($_SESSION['signupCodeType']))
{
	header("Location:inscription.php");
}

if(isset($_POST['inscriptionSuite'])) {
	
	$firstName = $_POST['nom'];
	$lastName = $_POST['prenom'];
	$birthdate = $_POST['date'];
	$address = (empty($_POST['adressePostale'])) ? "" : empty($_POST['adressePostale']); // Champ optionnel
	$postCode = $_POST['codePostal'];
	$city = (empty($_POST['ville'])) ? "" : empty($_POST['ville']); // Champ optionnel
	$country = $_POST['pays'];
	$phoneNumber = (empty($_POST['numeroDeTelephone'])) ? 0 : empty($_POST['numeroDeTelephone']); //Champ optionnel
	if($_SESSION['signupCodeType'] == "instructor")	
	{
		$userType = "Pilot";
	}
	else if($_SESSION['signupCodeType'] == "structure")
	{
		$userType = "Instructor";
	}
	else
	{
		echo('erreur');
	}
	$email = $_SESSION['signupMail'];
	$password = $_SESSION['signupPassword'];
	
	
	
	
	
	$request = $bdd->prepare('INSERT INTO user VALUES (0, ?, ?, ?, ?, ?, ?,1,1,1, ?, ?, ?, ?, ?,"","P",0)');
	//CERTAINES VALEURS SONT A VERIF : Instructor, structure, les champs obligatoires et optionnels + cpafini
	
	$request->execute(array($firstName,$lastName,$userType,$email,$password,$birthdate,$address,$city,$postCode,$country,$phoneNumber));


  $code=uniqid(true);
  $requete = $bdd->query('SELECT id FROM user WHERE  email=\''.$email.'\'');
	if($donnee = $requete->fetch())
	{
    $reqCode = $bdd->prepare('UPDATE user SET validation_key=? WHERE  email =?');
    $reqCode->execute(array($code,$email));

$mail = new PHPMailer(true);

try {
    //Server settings
  
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/inscriptionCompteActive?code=$code";
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.free.fr';   
    $mail->SMTPDebug = 3;                 // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'health.foundation.g3c@free.fr';                     // SMTP username
    $mail->Password   = "mQlcsjk5:sa.M";                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('health.foundation.g3c@free.fr', 'Health Foundation');
    $mail->addAddress($email);     // Add a recipient
    $mail->addReplyTo('no-reply-health.foundation.g3c@free.fr', 'No reply');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation du compte';
    $mail->Body    = " Cliquez sur ce <a href='$url'>lien  </a>pour changer votre mot de passe
     Ou copiez ce lien http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/inscriptionCompteActive?code=$code dans votre navigateur
      ";
    $mail->AltBody = " Cliquez sur ce <a href='$url'>lien  </a>pour changer votre mot de passe
    Ou copiez ce lien http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/inscriptionCompteActive?code=$code dans votre navigateur
     ";


    $mail->send();
    header("Location:inscriptionMailEnvoye.php");
} catch (Exception $e) {
  
    echo "Le message n'a pas pu être envoyé Mailer Error: {$mail->ErrorInfo}";
}
  }
  else{
    echo "Le mail n'existe pas";
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
    <div class="pageInscriptionSuite">
        <span>
          <a class="enteteInscription"> Coordonnées </a>
          
        </span>
         
          <fieldset>
          <form action="" method="post"> 
		  <?php if($_SESSION['signupCodeType'] == "instructor") : ?>
          <h3> Inscription Pilote </h3>
		  <?php endif;?>
		  <?php if($_SESSION['signupCodeType'] == "structure") : ?>
          <h3> Inscription Formateur </h3>
		  <?php endif;?>
          <label for="nom" id="nom">Nom <span class="etoile"> * </span> </label>
          <input type="text" name="nom" id="nom">
          <br>
          <label for="prenom" id="prenom">Prénom <span class="etoile"> * </span> </label>
          <input type="text" name="prenom" id="prenom">
          <br>
          <label for="date" id="date">Date de naissance <span class="etoile"> * </span> </label>
          <input type="date" name="date" id="date">
          <br>
          <label for="adressePostale" id="adressePostale">Adresse postale</label>
          <input type="text" name="adressePostale" id="adressePostale">
          <br>
          <label for="codePostal" id="codePostal">Code postal <span class="etoile"> * </span> </label>
          <input type="string" name="codePostal" id="codePostal">
		  <br>
          <label for="ville" id="ville">Ville</label>
          <input type="text" name="ville" id="ville">
          <br>
          <label for="pays" id="pays">Pays <span class="etoile"> * </span> </label>
          <input type="text" name="pays" id="pays">
          <br>
          <label for="numeroDeTelephone" id="numeroDeTelephone">Numéro de téléphone</label>
          <input type="string" name="numeroDeTelephone" id="numeroDeTelephone">
          <br>
          <h5> (<span class="etoile"> * </span> champ obligatoire) </h5>

          <input type="checkbox" name="politiqueDeConfidentialite" id="politiqueDeConfidentialite"> J'accepte et j'ai lu la politique de confidentialité <br>

          <input class="submitButtons" type="submit" Value="Terminer l'inscription" name="inscriptionSuite"> 
        </form>
        </fieldset>
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




