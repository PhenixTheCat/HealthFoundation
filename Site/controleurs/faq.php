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

include('./modele/requests.faq.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "accueil";
} else {
    $function = $_GET['function'];
}
$database = connectdb();
switch ($function) {

    case 'faq':

        $vue = "faq";
        $error = false;
        $error = "laf";
        if (isset($_POST["envoi"])) {
            $error = false;
            if (isString($_POST['nom']) and isString($_POST['prenom']) and isString($_POST['mail']) and isString($_POST['message'])) {
                $last_name = $_POST['nom'];
                $first_name = $_POST['prenom'];
                $email = $_POST['mail'];
                $question = $_POST['message'];

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    insertQuestion($database, $first_name, $last_name, $email, $question);
                    $error = "Question envoyée<br />";
                } else {
                    $error = "Adresse mail non valide";
                }
            } else {
                $error = "Tous les champs doivent être remplis";
            }
        }
        break;

    case 'faqReponse':

        $vue = "faqReponse";
        $error = "false";
        $answer = printQuestion($database);
        if (isset($_POST['Envoyer'])) {
            if (isString($_POST['answer'])) {

                $id = $_POST['id'];
                $answer = $_POST['answer'];
                if (answerQuestion($database, $answer, $id)) {
                    $email = $_POST['email'];
                    sendMail($email, 'FAQ - Réponse', $answer);
                    header("Location: index.php?redirect=faq&function=faqReponse");
                }
            } else {
                $error = "Vous ne pouvez pas envoyer une réponse vide!";
            }
        }
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