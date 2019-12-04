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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    <?php
    if(isset($_POST) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['mail']) AND isset($_POST['objet']) AND!empty($_POST['message'])){
        if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail'])
            AND !empty($_POST['objet']) AND!empty($_POST['message'])){



                require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/SMTP.php';
            
            $nom = securisation($_POST['nom']);
            $prenom = securisation($_POST['prenom']);
            $email = securisation($_POST['mail']);
            $objet = securisation($_POST['objet']);
            $message = str_replace("\n.", "\n..", $_POST['message']);
            $mail = new PHPMailer(true);

            $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.free.fr';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'health.foundation.g3c@free.fr';                     // SMTP username
                $mail->Password   = "mQlcsjk5:sa.M";                               // SMTP password
                $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 465;     

                $mail->setFrom('health.foundation.g3c@free.fr', 'Health Foundation');
                $mail->addAddress('health.foundation.g3c@gmail.com','Health Foundation -  Contact'); 

                if ($mail->addReplyTo($email, $nom .$prenom )){ 
                    $mail->Subject = 'Contact';
                    $mail->isHTML(false);
                    $mail->Body = <<<EOT
                    Email: $email
                    Nom : $nom
                    Prénom : $prenom
                    Objet : $objet
                    Message: $message
                    EOT;
                $mail->send();
                if (!$mail->send()) {
                    $erreur =  "Il y a eu un problème veuillez réessayer plus tard !";
                } else {
                    header('Location:contactMessageEnvoye.php');
                }
            }
             else {
                $erreur = 'Adresse mail invalide';
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être remplis";
        }
    } 
    
    function securisation($donnees){
        $donnees = trim($donnees);
        $donnees = stripcslashes($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }
    ?>


    <div class="headerContact">
    <h1 > Contact </h1>
  </div>
    <?php if (!empty($erreur)) {
    echo "<h2>$erreur</h2>";
} ?>
    <div class="formulaireContact">  
      
    <form action="" method="post" >
    <label for="Nom" id="nom">Nom</label>
    <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom"  placeholder="Votre prénom" value="<?php if(isset($_POST['prenom'])) { echo $_POST['prenom']; } ?>" /><br /><br />
    <label for="mail">Adresse e-mail</label>
    <input type="email" name="mail"  placeholder="Votre mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
    <label for="objet">Objet</label>
    <input type="text" name="objet"  placeholder="L'objet du mail" value="<?php if(isset($_POST['objet'])) { echo $_POST['objet']; } ?>" /><br /><br />
    <label for="message">Votre message</label>
    <textarea name="message" rows="10" cols= "55"  placeholder="Votre message" >
        <?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>
    </textarea>
    <input class="submitButtons" type="submit" Value="Envoyer" id="envoi">
      </form>
  </div> 

  <footer id="footer">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
				<?php if(!$_SESSION['isConnected']) : ?> 
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
