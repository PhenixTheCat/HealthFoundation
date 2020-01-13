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

include('./modele/requests.user.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "accueil";
} else {
    $function = $_GET['function'];
}

switch ($function) {

    case 'contact':
        $error = false;

        $vue = "contact";
        $title = "Contact";

        if (isset($_POST) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mail']) and isset($_POST['objet']) and !empty($_POST['message'])) {
            if (
                isString($_POST['nom']) and isString($_POST['prenom']) and isString($_POST['mail'])
                and isString($_POST['objet']) and isString($_POST['message'])
            ) {

                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['mail'];
                $objet = $_POST['objet'];
                $message = $_POST['message'];
                if (receiveMail($email, $nom, $prenom, $email, $objet)) {
                    header("Location:index.php?redirect=contact&function=contactMessageEnvoye");
                } else {
                    $error = "Le mail n'a pas été envoyé";
                }
            } else {
                $error = "Tous les champs doivent être remplis";
            }
        }
        break;

    case 'contactMessageEnvoye':

        $vue = "contactMessageEnvoye";
        $title = "Contact";
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "404";
        $title = "404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include('vues/header.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');
?>