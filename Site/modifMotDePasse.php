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

if(isset($_SESSION['userID'])){
  $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
  $requser->execute(array($_SESSION['userID']));
  $user = $requser->fetch();
}
if(isset($_POST['piloteModifMdp'])){
  $ancienMdp = sha1($_POST['Amdp']);
  $nouveauMdp=sha1($_POST['Nmdp']);
  $confirmationMdp=sha1($_POST['Cmdp']);
    if (!empty($_POST['Nmdp']) AND !empty($_POST['Cmdp']) AND !empty($_POST['Amdp'])) {
      if($user['password']==$ancienMdp){
              if($nouveauMdp==$confirmationMdp){
              $reqNouveauMdp = $bdd->prepare('UPDATE user SET password =? WHERE  id =?');
              $reqNouveauMdp->execute(array($nouveauMdp,$_SESSION['userID']));
              header("Location:motDePasseOublieConfirmation.php");
              }
             else {
                $erreur= 'Les mots de passe ne correspondent pas!';
              }
            }else{
              $erreur= "L'ancien mot de passe n'est pas valide!";
            }
          }else {
        $erreur= 'Veuillez remplir tous les champs';
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
  <body class= "allPage">

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="apropos.php">A propos </a></li>
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
    <div class="headerContact">
    <h1 > Mon compte </h1>


    <div class="piloteModiMdp">    
    <?php
        if(isset($erreur)) {
            echo '<font color="black">'.$erreur."</font>";
         }
         ?>
            <fieldset>
            <form action=""  method="post"> 
            <h4> Modification du mot de passe </h4>
            <label for="Amdp" id="Amdp">Ancien mot de passe </label>
            <input type="password" name="Amdp" id="Amdp">
            <br>
             <label for="Nmdp" id="Nmdp">Nouveau mot de passe </label>
            <input type="password" name="Nmdp" id="Nmdp">
            <br>
            <label for="Cmdp" id="Cmdp">Confirmer votre mot de passe </label>
            <input type="password" name="Cmdp" id="Cmdp">
            <br>

            <input type="submit" Value="Enregistrer" name="piloteModifMdp" > 
        </form>
        </fieldset>
      </div>
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