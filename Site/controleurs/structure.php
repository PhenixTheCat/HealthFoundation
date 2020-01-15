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

include('./modele/requests.structure.php');
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
        break;


    case 'gestionDesStructures':
        $vue = "gestionDesStructures";
        $error = false;
        if (isset($_POST['rechercher'])) {
            if (isString($_POST['searchUser'])) {
                $search = $_POST['searchUser'];
                $structure = searchStructureByName($database, $search);
            } else {
                $error = "Rentrez le nom d'une structure!";
            }
        } else {
            if (getStructure($database) != array(null)) {
                $structure = getStructure($database);
            }
        }
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            if (deleteStructure($database, $id)) {
                header('Location:index.php?redirect=structure&function=gestionDesStructures');
            } else {
                $error = "La structure n'a pas pu être supprimé!";
            }
        }
        if (isset($_POST['generateCode'])) {
            $id = $_POST['id'];
            $code = uniqid("struc");
            if (changeCodeStructure($database, $id, $code)) {
                header('Location:index.php?redirect=structure&function=gestionDesStructures');
            } else {
                $error = "Le code n'a pas pu être généré!";
            }
        }
        if (isset($_POST['addStructure'])) {
            header('Location :index.php?redirect=structure&function=ajouterUneStructure');
        }
        if (isset($_POST['inactive'])) {
            $id = $_POST['id'];
            if (passStructureToInactive($database, $id)) {
                header('Location:index.php?redirect=structure&function=gestionDesStructures');
            }
        }
        $userToValidate = getReferentNotValidated($database);
        if (isset($_POST['activate'])) {
            $id = $_POST['id'];
            validateUser($database, $id);
            header('Location:index.php?redirect=structure&function=gestionDesStructures');
        }
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            deleteUser($database, $id);
            header('Location:index.php?redirect=structure&function=gestionDesStructures');
        }







        break;

    case 'ajouterUneStructure':
        $vue = 'ajouterUneStructure';
        $error = false;
        if (isset($_POST['addStructure'])) {
            if (isString($_POST['name']) && isString($_POST['address']) && isString($_POST['city']) && isString($_POST['postcode'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $postcode = $_POST['postcode'];
                $country = $_POST['country'];
                $phoneNumber = $_POST['phoneNumber'];
                $code = uniqid("struc");
                $data = array($name, $address, $city, $postcode, $country, $phoneNumber, $code);
                if (insertStructure($database, $data)) {
                    header('Location:index.php?redirect=structure&function=gestionDesStructures');
                } else {
                    $error = "erreur lors de l'insertion";
                }
            } else {
                $error = "Remplir tous les champs";
            }
        }
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