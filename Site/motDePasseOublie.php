<?php
session_start();
try{

		//$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');

		$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');

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


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["motDePasseOublie"])){

  $mailTo= $_POST["mail"];
  $code=uniqid(true);
  $requete = $bdd->query('SELECT id FROM user WHERE  email=\''.$mailTo.'\'');
	if($donnee = $requete->fetch())
	{
    $requetemdp = $bdd->query("INSERT INTO resetPass(email,code) VALUES ('$mailTo','$code')");

    // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
  
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/motDePasseOublieNouveauMotDePasse.php?code=$code";
    $url= "motDePasseOublieNouveauMotDePasse.php";
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.free.fr';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'health.foundation.g3c@free.fr';                     // SMTP username
    $mail->Password   = "mQlcsjk5:sa.M";                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('health.foundation.g3c@free.fr', 'Health Foundation');
    $mail->addAddress($mailTo);     // Add a recipient
    $mail->addReplyTo('no-reply-health.foundation.g3c@free.fr', 'No reply');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Changement de mot de passe';
    $mail->Body    = "Vous avez démandé un changement de mot de passe ?
     Cliquez sur ce <a href='$url'>lien  </a>pour changer votre mot de passe
     Ou copiez ce lien http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/motDePasseOublieNouveauMotDePasse.php?code=$code dans votre navigateur
      ";
    $mail->AltBody = "Vous avez démandé un changement de mot de passe ?
    Cliquez sur ce <a href='$url'>lien</a>pour changer votre mot de passe"
     ;


    $mail->send();
    header("Location:motDePasseOublieMailEnvoye.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
        </div>
            <div class="partieDroite">
            <nav id="menu">
                <ul>
                    <li><a href="index.php"> Accueil</a></li>
                    <li><a href="aPropos.php">À propos </a></li>
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
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
            </div>

    </header>
    <div class="centrer_bloc">
     <div class="motDePasseOublie">
        <span class="enteteInscription">
          <a> Mot de passe oublié </a>
          
        </span>

        <fieldset>
          <form action="" method="post"> 
          <p>Veuillez indiquer l'adresse e-mail associée à votre compte </p>

          <label for="mail" id="email">Email</label>
          <input type="email" name="mail" id="mail" >
          <br>
          <input type="submit" Value="Valider" name="motDePasseOublie">
          </form>
        </fieldset>
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









