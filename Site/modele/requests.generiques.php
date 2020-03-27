<?php

// requêtes génériques pour récupérer les données de la database

// Appel du fichier déclarant PDO
include("modele/connexion.php");

/**
 * Récupère tous les éléments d'une table
 * @param PDO $database
 * @param string $table
 * @return array
 */

function getAll(PDO $database, string $table, $order): array
{
    $query = 'SELECT * FROM ' . $table . 'ORDER BY' . $order;
    return $database->query($query)->fetchAll();
}

/**
 * Recherche des éléments en fonction des attributs passés en paramètre
 * @param PDO $database
 * @param string $table
 * @param array $attributs
 * @return array
 */

function search(PDO $database, string $table, array $attributs): array
{

    $where = "";
    foreach ($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);

    $statement = $database->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);


    foreach ($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();

    return $statement->fetchAll();
}

/**
 * Insère un nouvel élément dans une table
 * @param PDO $database
 * @param array $values
 * @param string $table
 * @return boolean
 */

function insertion(PDO $database, array $values, string $table): bool
{

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 2);

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';

    $donnees = $database->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }

    return $donnees->execute();
}
function getResultatsOverallResult(PDO $database, int $id): array
{

    try {

        $query = $database->prepare("SELECT D.type, A.date , A.duration, B.location, C.name ,H.last_name, H.first_name,G.name,A.value, G.unit FROM test A JOIN testbed B JOIN structure C JOIN psychotechnical_data D JOIN user F JOIN sensor G JOIN user H WHERE B.id = A.testbed AND B.structure = C.id AND A.instructor = H.id AND G.measured_data = D.id AND G.id = A.sensor AND F.id = ? 
        ORDER BY date DESC");
        $query->execute(array($id));
        return $query->fetchAll();
    } catch (Exception $e) {
        return array(null);
    }
}


function getResultatsStressManagement(PDO $database, int $id): array
{
    try {

        $query = $database->prepare("SELECT D.type, A.date , A.duration, B.location, C.name ,H.last_name, H.first_name,G.name,A.value, G.unit FROM test A JOIN testbed B JOIN structure C JOIN psychotechnical_data D JOIN user F JOIN sensor G JOIN user H WHERE B.id = A.testbed AND B.structure = C.id AND A.instructor = H.id AND G.measured_data = D.id AND G.id = A.sensor AND F.id = ? AND G.measured_data = 1
        ORDER BY date DESC");
        $query->execute(array($id));
        if ($query->rowCount() > 0) {
            return $query->fetchAll();
        } else {
            return array(null);
        }
    } catch (Exception $e) {
        return array(null);
    }
}
function getResultatsThresholdOfPerseption(PDO $database, int $id): array
{
    try {

        $query = $database->prepare("SELECT D.type, A.date , A.duration, B.location, C.name ,H.last_name, H.first_name,G.name,A.value, G.unit FROM test A JOIN testbed B JOIN structure C JOIN psychotechnical_data D JOIN user F JOIN sensor G JOIN user H WHERE B.id = A.testbed AND B.structure = C.id AND A.instructor = H.id AND G.measured_data = D.id AND G.id = A.sensor AND F.id = ? AND G.measured_data = 2
        ORDER BY date DESC");
        $query->execute(array($id));
        if ($query->rowCount() > 0) {
            return $query->fetchAll();
        } else {
            return array(null);
        }
    } catch (Exception $e) {
        return array(null);
    }
}
function getResultatsReactionTime(PDO $database, int $id): array
{
    try {

        $query = $database->prepare("SELECT D.type, A.date , A.duration, B.location, C.name ,H.last_name, H.first_name,G.name,A.value, G.unit FROM test A JOIN testbed B JOIN structure C JOIN psychotechnical_data D JOIN user F JOIN sensor G JOIN user H WHERE B.id = A.testbed AND B.structure = C.id AND A.instructor = H.id AND G.measured_data = D.id AND G.id = A.sensor AND F.id = ? AND G.measured_data = 3
        ORDER BY date DESC");
        $query->execute(array($id));
        if ($query->rowCount() > 0) {
            return $query->fetchAll();
        } else {
            return array(null);
        }
    } catch (Exception $e) {
        return array(null);
    }
}



function getResultatsAcknowledgmentOfTotality(PDO $database, int $id): array
{
    try {

        $query = $database->prepare("SELECT D.type, A.date , A.duration, B.location, C.name ,H.last_name, H.first_name,G.name,A.value, G.unit FROM test A JOIN testbed B JOIN structure C JOIN psychotechnical_data D JOIN user F JOIN sensor G JOIN user H WHERE B.id = A.testbed AND B.structure = C.id AND A.instructor = H.id AND G.measured_data = D.id AND G.id = A.sensor AND F.id = ? AND G.measured_data = 4
        ORDER BY date DESC");
        $query->execute(array($id));
        if ($query->rowCount() > 0) {
            return $query->fetchAll();
        } else {
            return array(null);
        }
    } catch (Exception $e) {
        return array(null);
    }
}



function getResultatsPsychotestEnLigne(PDO $database, int $id): array
{
    try {

        $query = $database->prepare("SELECT D.type, A.date , A.duration, B.location, C.name ,H.last_name, H.first_name,G.name,A.value, G.unit FROM test A JOIN testbed B JOIN structure C JOIN psychotechnical_data D JOIN user F JOIN sensor G JOIN user H WHERE B.id = A.testbed AND B.structure = C.id AND A.instructor = H.id AND G.measured_data = D.id AND G.id = A.sensor AND F.id = ? AND G.measured_data = 5
        ORDER BY date DESC");
        $query->execute(array($id));
        if ($query->rowCount() > 0) {
            return $query->fetchAll();
        } else {
            return array(null);
        }
    } catch (Exception $e) {
        return array(null);
    }
}


?>
