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


      <div class ="reconnaissanceDeTonalite">
      <h1>Reconnaissance de tonalité</h1>
      <div class="testResults">
<?php
// $NbreData : le nombre de données à afficher
// $NbrCol : le nombre de colonnes
// $NbrLigne : calcul automatique a la FIN
// -------------------------------------------------------


// requête
$table = 'results A JOIN psychotechnical_data B JOIN test C ON A.id=B.id AND A.test=C.id AND C.measured_data=B.id';
    $condition = "WHERE measured_data LIKE '4' ORDER BY date DESC";
    // measured_date LIKE '4' correspond au test ReconnaissanceDeTonalite je lui ai mis un ID de 4 pour le reconnaître
$query = 'SELECT * FROM '.$table." ".$condition;

try {
    $pdo_select = $bdd->prepare($query);
    $pdo_select->execute();
    $NbreData = $pdo_select->rowCount();    // nombre d'enregistrements (lignes)
    $rowAll = $pdo_select->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
// --------------------------------
 // affichage
if ($NbreData != 0)
{
?>
    <table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>test</th>
            <th>timeline</th>
            <th>value</th>
            <th>id</th>
            <th>type</th>
            <th>unité</th>
            <th>id</th>
            <th>date</th>
            <th>durée</th>
            <th>score</th>
            <th>banc de test</th>
            <th>les données mesurées</th>
            <th>pilot</th>
            <th>instructeur</th>
            <th>capteurs</th>
        </tr>
    </thead>
    <tbody>
<?php
    // pour chaque ligne (chaque enregistrement)
    foreach ( $rowAll as $row )
    {
        // DONNEES A AFFICHER dans chaque cellule de la ligne
?>
        <tr>
                       <td><?php echo $row['id']; ?></td>
                       <td><?php echo $row['test']; ?></td>
                       <td><?php echo $row['timeline']; ?></td>
                       <td><?php echo $row['value']; ?></td>
                       <td><?php echo $row['id']; ?></td>
                       <td><?php echo $row['type']; ?></td>
                       <td><?php echo $row['unit']; ?></td>
                       <td><?php echo $row['id']; ?></td>
                       <td><?php echo $row['date']; ?></td>
                       <td><?php echo $row['duration']; ?></td>
                       <td><?php echo $row['score']; ?></td>
                       <td><?php echo $row['testbed']; ?></td>
                       <td><?php echo $row['measured_data']; ?></td>
                       <td><?php echo $row['pilot']; ?></td>
                       <td><?php echo $row['instructor']; ?></td>
                       <td><?php echo $row['sensor']; ?></td>
        </tr>
<?php
    } // fin foreach
?>
    </tbody>
    </table>
<?php
} else { ?>
    pas de données à afficher
<?php
}
?>
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
