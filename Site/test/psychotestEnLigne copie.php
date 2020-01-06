
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

<!DOCTYPE html >
<html  lang="fr" >
  <head>
		
    <title>Test psychotechnique en ligne</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
	
	<link rel="stylesheet" type="text/css" href="style/noir.css" />
	<script type="text/javascript" src="js/questions.js"></script>
    <script type="text/javascript" src="js/sqb.js"></script>
  </head>


  <body onload="start();">
    <div id="main">
      <div id="titre">.</div>
      <div id="instructions">.</div>
      <div id="questions">.</div>
    </div>
	

  <script src="script.js"></script> 
  </body>
  
</html>