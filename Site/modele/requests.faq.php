<?php

// on récupère les requêtes génériques
include('requests.generiques.php');

//on définit le nom de la table
$table = "faq";

// requêtes spécifiques à la table faq
/**
 * Insérer une question
 * @param PDO $database
 * @param string $first_name
 * @param string $last_name
 * @param string $email
 * @param string $question
 */

function insertQuestion(PDO $database, string $first_name, string $last_name, string $email, $question)
{
  try {

    $reqInsertQuestion = $database->prepare("INSERT INTO `faq` (`id`, `first_name`, `last_name`, `email`, `question`, `answer`) VALUES (NULL, :first_name,:last_name,:email,:question, NULL)");
    $data = array(
      'first_name' => $first_name,
      'last_name' => $last_name,
      'email' => $email,
      'question' => $question
    );
    $reqInsertQuestion->execute($data);

    return true;
  } catch (Exception $error) {
    die("Erreur lors de l'insertion de la question : " . $error->getMessage() . " Vérifiez dans le code source les instructions");
    return false;
  }
}

/**
 * Afficher les questions
 * @param PDO $database

 */

function printQuestion(PDO $database)
{
  try {
    $reqPrintQuestion = $database->prepare("SELECT *  FROM faq WHERE answer is null");
    $reqPrintQuestion->execute();
    return $reqPrintQuestion->fetchAll();
  } catch (Exception $error) {
    die("Erreur lors de l'insertion de la question : " . $error->getMessage() . " Vérifiez dans le code source les instructions");
  }
}



//Répondre à une question
/**
 * Répondre à une question
 * @param PDO $database
 * @param string $question
 * @param string $answer
 */


function answerQuestion(PDO $database, string $answer, string $id)
{

  try {

    $reqInsertQuestion =  $database->prepare('UPDATE faq SET answer  =? WHERE  id =?');
    $reqInsertQuestion->execute(array($answer, $id));

    return true;
  } catch (Exception $error) {
    die("Erreur lors de l'envoi de la réponse : " . $error->getMessage() . " Vérifiez dans le code source les instructions");
    return false;
  }
}
?>