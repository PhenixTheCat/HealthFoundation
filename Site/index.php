<?php

/**
 * MVC :
 * - index.php : identifie le routeur à appeler en fonction de l'url
 * - Contrôleur : Crée les variables, élabore leurs contenus, identifie la vue et lui envoie les variables
 * - Modèle : contient les fonctions liées à la database et appelées par les contrôleurs
 * - Vue : contient ce qui doit être affiché
 **/

session_start();
// Appel des fonctions du contrôleur
include("controleurs/fonctions.php");
// Appel des fonctions liées à l'affichage
include("vues/fonctions.php");

if(!isset($_SESSION['isConnected']))
{
	$_SESSION['isConnected'] = false;
}
if(!isset($_SESSION['userType']))
{
	$_SESSION['userType'] = "user";
}
//Test si l'utilisateur veut se déconnecter
if(isset($_GET['deconnexion']))
{
	$_SESSION['isConnected'] = false;
	$_SESSION['userType'] = "user";
	header('Location:index.php');
	exit();
}


// On identifie le contrôleur à appeler dont le nom est contenu dans redirect passé en GET
if(isset($_GET['redirect']) && !empty($_GET['redirect'])) {
    // Si la variable redirect est passé en GET
    $url = $_GET['redirect']; //user, sensor, etc.
    
} else {
    // Si aucun contrôleur défini en GET, on bascule sur user
    $url = 'user';
}

// On appelle le contrôleur
include('controleurs/' . $url . '.php');
