<?php

try{
	//connexion à la database
	$bdd = new PDO('mysql:host=localhost;dbname=health_foundation;charset=utf8','root','');
}
catch(Exception $error)
{
	die('Erreur lors du chargement de la base de donnée : '.$error->getMessage());
}

$requete = $bdd->query('SELECT * FROM user WHERE email=\''.$_POST['mail'].'\' AND password_hash(password) =\''.$_POST['mdp'].'\'');

if($donnee = $requete->fetch())
{
	echo 'ça marche';
}
else
{
	header('Location: connexion_retry.php');
	exit();
}


?>
