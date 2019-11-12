<?php

session_start();
try{

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
$code=$_GET['code'];

if(!isset($_GET["code"])){
  exit(header("Location:404.php"));
}

$reqemail = $bdd->query('SELECT email FROM resetPass WHERE  code = "$code"');
/*if(mysqli_num_rows($reqemail)==0){
  exit(header("Location:404.php"));
}*/

if(isset($_POST['nouveauMdp'])){
  $nouveauMdp=sha1($_POST['Nmdp']);
  $confirmationMdp=sha1($_POST['Cmdp']);
  $mailPresent = mysqli_fetch_array($reqemail);
  $mail=$row["email"];
      if (!empty($_POST['Nmdp']) AND !empty($_POST['Cmdp'])) {
              if($nouveauMdp==$confirmationMdp){
                $reqNouveauMdp = $bdd->query("UPDATE user SET password='$nouveauMdp' WHERE  email ='$mail' ");
              if($reqNouveauMdp->fetch()){
                $reqNouveauMdp = $bdd->query('DELETE FROM resetPass WHERE  code = "$code"');
                header("Location: motDePasseOublieConfirmation.php");
              }
              else{
                echo "erreur";
              }
              
              } else {
                  echo 'Les mots de passe ne correspondent pas!';
              }
      } else {
          echo 'Veuillez remplir tous les champs';
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
            <nav id="menu">
                <ul>
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="aPropos.php">A propos </a></li>
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

</header>
    <div class="centrer_bloc">
    <div class="nouveauMdp">
        <span>
          <a class="enteteNouveauMdp"> Nouveau mot de passe </a>
          
        </span>
           
            <fieldset>
            <form action="" method="post"> 

            <label for="Nmdp" id="Nmdp">Nouveau mot de passe </label>
            <input type="password" name="Nmdp" id="Nmdp">
            <br>
            <label for="Cmdp" id="Cmdp">Confirmer votre mot de passe </label>
            <input type="password" name="Cmdp" id="Cmdp">
            <br>
            <input type="submit" Value="Valider" name="nouveauMdp"> 
        </form>
        </fieldset>
      </div>
    </div>
      
<footer class="footerBloque">
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
