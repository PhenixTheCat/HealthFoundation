
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
if($_SESSION['isConnected']) {
  $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
  $requser->execute(array($_SESSION['userID']));
  $user = $requser->fetch();
if(isset($_POST['adminModifMdp'])) {
  //if(!empty($_POST['Nmdp']) AND !empty($_POST['Amdp']) AND !empty($_POST['Cmdp'])) {
      $amdp = $_POST['Amdp'];
      $nmdp = sha1($_POST['Nmdp']);
      $cmdp = sha1($_POST['Cmdp']);
      if($amdp==$user['password']){
        if($nmdp == $cmdp) {
          $reqnmdp = $bdd->prepare("UPDATE user SET password = ? WHERE id = ?");
          $reqnmdp -> execute(array($nmdp,$_SESSION['userID']
            ));
              $erreur = 'Modification prise en compte';
              header('admin-compte-perso.php');
                  }
              else{
                      $erreur = "Vos mots de passes ne correspondent pas !";
                  }
              } else {
                 $erreur = "Mot de passe actuel n'est pas le bon";
              }
          // }
     //$erreur = "Tous les champs doivent être complétés !";
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


    <div class="adminModiMdp">
          <?php
         if(isset($erreur)) {
            echo '<font color="black">'.$erreur."</font>";
         }
         ?>    
            <fieldset>
            <form action=""  method="post"> 
            <h3> Modification du mot de passe </h3>
            <label for="Amdp" id="Amdp">Ancien mot de passe </label>
            <input type="password" name="Amdp" id="Amdp">
            <br>
            <label for="Nmdp" id="Nmdp">Nouveau mot de passe </label>
            <input type="password" name="Nmdp" id="Nmdp">
            <br>
            <label for="Cmdp" id="Cmdp">Confirmer votre mot de passe </label>
            <input type="password" name="Cmdp" id="Cmdp">
            <br>

            <input type="submit" Value="Enregistrer" name="adminModifMdp" > 
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
                <li><a href="accueil.php">Déconnexion</a></li>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>

  </body>
</html>
