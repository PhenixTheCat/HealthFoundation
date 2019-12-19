<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur des tests 
 */

// on inclut le fichier modèle contenant les appels à la database

//include('./modele/requests.generiques.php');
include('./modele/requests.user.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "accueil";
} else {
    $function = $_GET['function'];
}
$database = connectdb();
switch ($function) {

    case 'accueil':
        //affichage de l'accueil
        $vue = "accueil";
        $title = "Accueil";
        break;


    case 'resultatsGlobaux':
        $vue = "resultatsGlobaux";
        $error = false;
        break;

    case 'resultatsGestionDuStress':

        $vue = "resultatsGestionDuStress";
        $error = false;
        $id = $_SESSION['pilotId'];

        if (getResultatsStressManagement($database, $id) != array(null)) {
            $rowAll = getResultatsStressManagement($database, $id);
            $NbreData = 1;
        } else {
            $NbreData = 0;
        }
        break;

    case 'resultatsReconnaissanceDeTonalite':

        $vue = "resultatsReconnaissanceDeTonalite";
        $error = false;
        $id = $_SESSION['pilotId'];
        if (getResultatsAcknowledgmentOfTotality($database, $id) != array(null)) {
            $rowAll = getResultatsAcknowledgmentOfTotality($database, $id);
            $NbreData = 1;
        } else {
            $NbreData = 0;
        }

        break;

    case 'resultatsTempsDeReaction':

        $vue = "resultatsTempsDeReaction";
        $error = false;
        $id = $_SESSION['pilotId'];
        if (getResultatsReactionTime($database, $id) != array(null)) {
            $rowAll = getResultatsReactionTime($database, $id);
            $NbreData = 1;
        } else {
            $NbreData = 0;
        }
        break;

    case 'resultatSeuilsDePerception':

        $vue = "resultatSeuilsDePerception";
        $error = false;
        $id = $_SESSION['pilotId'];
        if (getResultatsThresholdOfPerseption($database, $id) != array(null)) {
            $rowAll = getResultatsThresholdOfPerseption($database, $id);
            $NbreData = 1;
        } else {
            $NbreData = 0;
        }
        break;

    case 'resultats':

        $vue = "resultats";
        $error = false;
        break;

    case 'resultatsParPilote':

        $vue = "resultatsParPilote";
        $error = false;


        $user = getUserInfo($database, $_SESSION['pilotId']);
        break;


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "404";
        $error = false;
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');
?>