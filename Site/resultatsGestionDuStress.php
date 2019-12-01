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
            <nav id="menu">
                <ul>
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

                </ul>
                
                <div class=" logoLangue">
                    <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                    <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
                </div>
            </nav>
    	</header>


   <div class ="GestionDuStress">
    <span class = "Gestion du stress">
      <h1>Gestion du stress</h1>
	    <?php
// $NbreData : le nombre de données à afficher
// $NbrCol : le nombre de colonnes
// $NbrLigne : calcul automatique a la FIN
// -------------------------------------------------------


// requête
$table = '(results A JOIN psychotechnical_data B JOIN test C ON A.id=B.id AND A.test=C.id AND C.measured_data=B.id';
    $condition = 'WHERE measured_data LIKE'11' ORDER BY date DESC';
    // measured_date LIKE '11' correspond au test GestionDuStress je lui ai mis un ID de 11 pour le reconnaître
$query = 'SELECT * FROM '.$table.$condition;

try {
    $pdo_select = $pdo->prepare($query);
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
                       <td><?php echo $row['messured_data']; ?></td>
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
    </span>
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
