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
  $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
  $requser->execute(array($_SESSION['userID']));
  $user = $requser->fetch();
}

if(isset($_POST['modifProfil'])){ 
  $last_name = $_POST['nom'];
  $first_name = $_POST['prenom'];
  $birthdate = $_POST['date'];
  $email= $_POST['mail'];
  $adress= $_POST['adressePostale'];
  $postecode= $_POST['codePostale'];
  $city= $_POST['ville'];
  $country= $_POST['pays'];
  $phone_number=$_POST['numeroDeTelephone'];

    $reqModifProfil = $bdd->prepare("UPDATE user SET last_name= ?, first_name= ?,birthdate= ?,adress= ?,postecode= ?,city= ?,country= ?,phone_number= ? WHERE id = ?");
    $reqModifProfil->execute(array($last_name,
    $first_name,
    $birthdate,
    $adress,
    $postecode,
    $city,
    $country,
    $phone_number,$_SESSION['userID']));
    header("Location : modifProfilValidee.php");
  }


if(isset($_POST['modifmail'])){ 

  $email = $_POST['mail'];
  $reqmail = $bdd->prepare("SELECT * FROM user WHERE email = ?");
  $reqmail->execute(array($email));
  $mailexist = $reqmail->rowCount();
  if($mailexist == 0) {
    $reqModifProfil = $bdd->prepare("UPDATE user SET email=? WHERE id =?");
    $reqModifProfil->execute(array($email, $_SESSION['userID']));
    $erreur ="Mail enregistré";
  }
else{
  $erreur = "Le mail est déja utilisé";
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
    <div class="headerContact">
    <h1 > Mon compte </h1>
     
  
  

    <div class="piloteModifMdpp">  
           
            <fieldset>
            <form action=""  method="post"> 
            <?php
         if(isset($erreur)) {
            echo '<font color="black">'.$erreur."</font>";
         }
         ?>
            <h3> Informations détaillés </h3>
            <label for="nom" id="nom">Nom  </label>
            <input type="text" name="nom" id="nom" value="<?php echo $user['last_name']; ?>">
            <br>
            <label for="prenom" id="prenom">Prénom </label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $user['first_name']; ?>">
            <br>
            <label for="date" id="date"> Date de naissance </label>
            <input type="date" name="date" id="date">
            <br>
            
            <label for="mail" id="email">Adresse email</label>
            <input type="email" name="mail" id="mail" value="<?php echo $user['email']; ?>" >
            <input type="submit" Value="Enregistrer" name="modifmail" > 
            <br>
            <label for="adressePostale" id="adressePostale">Adresse postale</label>
            <input type="text" name="adressePostale" id="adressePostale" value="<?php echo $user['adress']; ?>">
            <br>
            <label for="codePostal" id="codePostal">Code postal</label>
            <input type="string" name="codePostale" id="codePostale" value="<?php echo $user['postecode']; ?>">
            <br>
            <label for="ville" id="ville">Pays </label>
            <input type="text" name="ville" id="ville" value="<?php echo $user['city']; ?>">
            <br>
            <label for="pays" id="pays">Pays </label>
            <input type="text" name="pays" id="pays" value="<?php echo $user['country']; ?>">
            <br>
            <label for="numeroDeTelephone" id="numeroDeTelephone">Numéro de téléphone</label>
            <input type="string" name="numeroDeTelephone" id="numeroDeTelephone" value="<?php echo $user['phone_number']; ?>">
            <br>

            <input class="submitButtons" type="submit" Value="Enregistrer" name="modifProfil" > 
        </form>
        </fieldset>
      </div>
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

