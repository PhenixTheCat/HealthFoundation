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
if(isset($_POST['save'])){
    if(isset($_POST['delete'])){
        $dataToDelete = implode(",",$_POST["delete"]); //plus simple que de faire une boucle for each
        echo $dataToDelete;

     $requete = $bdd->prepare("DELETE FROM user WHERE id IN ($dataToDelete) ");
     $requete->execute();
    
 }
 
 if(isset($_POST['banned'])){
    $idsToBan = implode(",",$_POST["banned"]); //plus simple que de faire une boucle for each
    $requete = $bdd->prepare("UPDATE user SET status = \"B\" WHERE id IN ($idsToBan) ");
    $requete->execute();
}
if(isset($_POST['instructor'])){
    
    $count = count($_POST['instructor']);
    for ($i = 0; $i < $count; $i++){
        $code =$_POST['instructorCode'][$i];
        $idsToInstructor = $_POST['instructor'][$i];

   $requete = $bdd->prepare("UPDATE user SET code = '$code' WHERE id = '$idsToInstructor' ");
   $requete->execute();
    }
}
if(isset($_POST['referent'])){    
    $count = count($_POST['referent']);
    $uniqId = [];
    for ($i = 0; $i < $count; $i++){
        $idsToReferent = $_POST['referent'][$i];
    $requete = $bdd->prepare("UPDATE structure SET referent = '$idsToReferent' WHERE id = (SELECT structure from user WHERE id = '$idsToReferent') ");
    $requete->execute();
    }
}
 //exit(header("Location:gestionDesUtilisateurs.php"));

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
					if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> 
                    <li><a href="monCompte.php">Mon compte</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
                    <?php endif;?>
                    
                    <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['admin']) : ?> 
                    
                    <li><a href="gestionUtilisateur.php">Gestion des <br> utilisateurs</a></li>
                    <li><a href="gestionDesStructures.php">Gestion des <br> structures</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
					<?php endif;?>
                </ul>
            </nav>
            <div class=" logoLangue">
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
            </div>

      </header>


    <div class="headerContact">
    <h1 > Gestion des utilisateurs</h1>
  </div>
    <?php if (!empty($erreur)) {
    echo "<h2>$erreur</h2>";
} ?>
    <div class="formulaireContact">  
      
    <form action="" id="searchUser" method="post">
    <input id="search" name="searchUser" type="text" placeholder="Rechercher" />
    <input id="submitButtons" type="submit" name ="rechercher" value="Rechercher" />
    </form>
<table border="1">
    <tr>
        <th>Nom </th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th> Type </th>
        <th>Gestion</th>
    </tr>

    <?php

if(isset($_POST['rechercher'])&&!empty($_POST['searchUser'])){
    $search = $_POST['searchUser'];
    $requete = $bdd->prepare("SELECT * FROM user where (last_name like '$search%' ||first_name like '$search%') ORDER BY last_name ");
    $requete->execute();
 
    while($donnee = $requete->fetch()){
        ?>
        <tr> 
            <td> <?php echo $donnee['last_name'] ?></td>
            <td> <?php echo $donnee['first_name'] ?></td>
            <td> <?php echo $donnee['birthdate'] ?></td>
            <td>    
                 Supprimer<input type="checkbox" name="delete"/> </br> 
                 Bannir<input type="checkbox"name="block"/> </br> 
                Formateur <input type="checkbox" name="instructor"/> </br> 
                 Référent <input type="checkbox" name="referent"/> </br> 
            </td>      
    </tr>

    <?php 
    }
    ?>
    
    <?php 
    }
    else{
        $requete = $bdd->prepare("SELECT * FROM user ORDER BY last_name");   
        $requete->execute();
        while($donnee = $requete->fetch()){
            ?>
            <tr> 
                <td> <?php echo $donnee['last_name'] ?></td>
                <td> <?php echo $donnee['first_name'] ?></td>
                <td> <?php echo $donnee['birthdate'] ?></td>
                <td> <?php echo $donnee['type'] ?></td>
                <td>
                <form action="" id="searchUser" method="post">
                Supprimer<input type="checkbox" name="delete[]" value="<?php echo $donnee['id']?>"/> </br> 
                 Bannir<input type="checkbox"name="banned[]" value="<?php echo $donnee['id']?>" /> </br> 
                Formateur <input type="checkbox" name="instructor[]" value="<?php echo $donnee['id']?>"/> </br> 
                <input type="text" name="instructorCode[]"</br> 
                 Référent <input type="checkbox" name="referent[]"value="<?php echo $donnee['id']?>" /> </br> 
                 <form action="" id="searchUser" method="post">
                 </td>
            
               
        
        </tr> 
        <?php
        }


}
        ?>
        
    </table>
    <form action="" id="searchUser" method="post">
    <input type="submit" name="save" value="Enregistrer">
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