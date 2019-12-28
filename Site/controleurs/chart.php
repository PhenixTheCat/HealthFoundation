<?php

/**
 * Le contrôleur :
 * - définit le contenu des variables à afficher
 * - identifie et appelle la vue
 */

/**
 * Contrôleur de l'utilisateur
 */

// on inclut le fichier modèle contenant les appels à la database

include('./modele/requests.test.php');
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

    case 'chartStress':
        $vue = "chart";
        $error = false;

        if(getTestTimeline($database,$_SESSION['pilotId'],1)!=array(null)&&getTestValue($database,$_SESSION['pilotId'],1)!=array(null)){
        drawPointGraphics("Resultats du stress en fonction du temps",(getTestTimeline($database,$_SESSION['pilotId'],1)),(getTestValue($database,$_SESSION['pilotId'],1)));}

        break;

    case 'chartTonality':
        $vue = "chart";
        $error = false;
        if(getTestTimeline($database,$_SESSION['pilotId'],1)!=array(null)&&getTestValue($database,$_SESSION['pilotId'],1)!=array(null)){
        drawPointGraphics("Resultats de la reconnaissance de tonalité en fonction du temps",(getTestTimeline($database,$_SESSION['pilotId'],1)),(getTestValue($database,$_SESSION['pilotId'],1)));
        }
        break;

    case 'chartReactionTime':
        $vue = "chart";
        $error = false;
        if(getTestTimeline($database,$_SESSION['pilotId'],1)!=array(null)&&getTestValue($database,$_SESSION['pilotId'],1)!=array(null)){
        drawPointGraphics("Resultats du temps de réaction en fonction du temps",(getTestTimeline($database,$_SESSION['pilotId'],1)),(getTestValue($database,$_SESSION['pilotId'],1)));
        }
      

        break;
            
    case 'chartPerception':
        $vue = "chart";
        $error = false;
        if(getTestTimeline($database,$_SESSION['pilotId'],1)!=array(null)&&getTestValue($database,$_SESSION['pilotId'],1)!=array(null)){
        drawPointGraphics("Resultats du seuil de perception en fonction du temps",(getTestTimeline($database,$_SESSION['pilotId'],1)),(getTestValue($database,$_SESSION['pilotId'],1)));
        }

        break;

        case 'chartBar':
            $vue = "chart";
            $error = false;
            //TODO : Ajouter les resultats des test moyens des femmes et des hommes
           
            drawBarGraphics("Moyenne des résultats de la structure des différents tests entre les femmes et les hommes",array(getTestAVGPerGender($database,'Female',1,$_SESSION['userID'])[0],getTestAVGPerGender($database,'Male',1,$_SESSION['userID'])[0]),array(getTestAVGPerGender($database,'Female',2,$_SESSION['userID'])[0],getTestAVGPerGender($database,'Male',2,$_SESSION['userID'])[0]),array(getTestAVGPerGender($database,'Female',3,$_SESSION['userID'])[0],getTestAVGPerGender($database,'Male',3,$_SESSION['userID'])[0]),array(getTestAVGPerGender($database,'Female',4,$_SESSION['userID'])[0],getTestAVGPerGender($database,'Male',4,$_SESSION['userID'])[0]));
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