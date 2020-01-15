
<?php
/*
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
<?php 
    
 
 /*
        if($_POST)
        {
        // VALUES 
        $score=$_POST['score'];
        
 
       mysql_query("INSERT INTO psychotestEnLigne (score) VALUES ( '".utf8_decode($score)."')");
        } else { 
 
           header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
            exit();
       }
 */
    ?>





<!DOCTYPE html >
<html  lang="fr" >
  <head>
		
    <title><?php echo _("Test psychotechnique en ligne");?></title>
    
  
	
	<link rel="stylesheet" type="text/css" href="psychotestEnLigne.css" />
	<script type="text/javascript" src="vues/js/questions.js"></script>
    <script type="text/javascript" src="vues/js/sqb.js"></script>
  </head>


  <body onload="start();">
    <div id="main">
      <div id=<?php echo _("titre");?></di>>.</div>
      <div id=<?php echo _("instructions");?></di>>.</div>
      <div id=<?php echo _("questions");?></di>>.</div>
    </div>
	

  
  </body>
  
</html>
