<?php

// on récupère les requêtes génériques


//on définit le nom de la table
$table = "resetpass";

// requêtes spécifiques à la table des reset de mot de passes


/**
 * Insérer une ligne à la table resetPass indique que un utilisateur à démandé un changement de mot
 * @param PDO $database
 * @param string $mailTo
 * @param string $code
 */
function insertInformationResetPass(PDO $database, string $mailTo, string $code)
{
    try {

        $reqResetPass = $database->prepare("INSERT INTO resetPass(email,code) VALUES (:email,:code)");
        $data = array(
            'email' => $mailTo,
            'code' => $code
        );

        return $reqResetPass->execute($data);
    } catch (Exception $error) {
        die("Erreur lors du chargement de l'insertion dans la table resetPass: " . $error->getMessage() . ' Vérifiez dans le code source les instructions');
    }
}
/**
 * Chercher le mail du code unique
 * @param PDO $database
 * @param string $code
 * @return string $mail
 */


function codeResetPassExist(PDO $database, string $code): bool
{
    try {
        $reqemail = $database->prepare('SELECT * FROM resetPass WHERE  code =?');
        $reqemail->execute(array($code));
        if ($reqemail->fetch()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $error) {
        die("Erreur lors de la recherche du mail " . $error->getMessage() . ' Vérifiez dans le code source les instructions');
        return false;
    }
}

/**
 * Chercher le mail du code unique
 * @param PDO $database
 * @param string $code
 * @return string $mail
 */


function searchMailResetPass(PDO $database, string $code)
{
    try {
        $reqemail = $database->prepare('SELECT email FROM resetPass WHERE  code =?');
        $reqemail->execute(array($code));
        return $reqemail->fetch();
    } catch (Exception $error) {
        die("Erreur lors de la recherche du mail " . $error->getMessage() . ' Vérifiez dans le code source les instructions');
    }
}

/**
 * Supprimer l'utilisateur de la table resetPass qui a changé son mot de passe à partir de son code
 * @param PDO $database
 * @param string $code
 */



function deleteInformationResetPass(PDO $database, string $code)
{
    try {
        $reqDelete = $database->prepare("DELETE FROM resetPass WHERE  code = '$code'");
        $reqDelete->execute();
        return true;
    } catch (Exception $error) {
        die('Erreur lors de la suppression dans la table resetPass : ' . $error->getMessage() . ' Vérifiez dans le code source les instructions');
        return false;
    }
}
?>