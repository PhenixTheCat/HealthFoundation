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

function getAll(PDO $database,string $table,$order): array {
    $query = 'SELECT * FROM ' . $table .'ORDER BY' .$order;
    return $database->query($query)->fetchAll();
}

/**
 * Recherche des éléments en fonction des attributs passés en paramètre
 * @param PDO $database
 * @param string $table
 * @param array $attributs
 * @return array
 */

function search(PDO $database,string $table, array $attributs): array {
    
    $where = "";
    foreach($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2);
    
    $statement = $database->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where );
    
    
    foreach($attributs as $key => $value) {
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

function insertion(PDO $database,array $values, string $table): bool {

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

 function getResultatsReactionTime(PDO $database,int $id): array {
    try{

        $query = $database->prepare("SELECT A.id, A.test, A.timeline, A.value, B.type, B.unit,C.date,C.duration,C.score,C.testbed,C.pilot,C.instructor,C.sensor FROM results A JOIN psychotechnical_data B JOIN test C ON A.id=B.id AND A.test=C.id AND C.measured_data=B.id WHERE (C.pilot=? AND measured_data LIKE '3') ORDER BY date DESC");
        $query->execute(array($id));
        if($query->rowCount()>0){
            return $query->fetchAll();}
            else{
                return array(null);
            }
        }
        catch(Exception $e){
            return array(null);
        }
     
   }
    
    function getResultatsStressManagement(PDO $database,int $id): array {
        try{

        $query = $database->prepare("SELECT A.id, A.test, A.timeline, A.value, B.type, B.unit,C.date,C.duration,C.score,C.testbed,C.pilot,C.instructor,C.sensor FROM results A JOIN psychotechnical_data B JOIN test C ON A.id=B.id AND A.test=C.id AND C.measured_data=B.id WHERE (C.pilot=? AND measured_data LIKE '1') ORDER BY date DESC");
        $query->execute(array($id));
        if($query->rowCount()>0){
        return $query->fetchAll();}
        else{
            return array(null);
        }
        }
        catch(Exception $e){
            return array(null);
        }
      }
    
    function getResultatsOverallResult(PDO $database,int $id): array {
      
           try{

            $query = $database->prepare("SELECT A.id, A.test, A.timeline, A.value, B.type, B.unit,C.date,C.duration,C.score,C.testbed,C.pilot,C.instructor,C.sensor FROM results A JOIN psychotechnical_data B JOIN test C ON A.id=B.id AND A.test=C.id AND C.measured_data=B.id WHERE C.pilot=?  ORDER BY date DESC");
            $query->execute(array($id));
            return $query->fetchAll();
            }
            catch(Exception $e){
                return array(null);
            }
         }
    
    function getResultatsAcknowledgmentOfTotality(PDO $database,int $id): array {
        try{

            $query = $database->prepare("SELECT A.id, A.test, A.timeline, A.value, B.type, B.unit,C.date,C.duration,C.score,C.testbed,C.pilot,C.instructor,C.sensor FROM results A JOIN psychotechnical_data B JOIN test C ON A.id=B.id AND A.test=C.id AND C.measured_data=B.id WHERE (C.pilot=? AND measured_data LIKE '4') ORDER BY date DESC");
            $query->execute(array($id));
            if($query->rowCount()>0){
                return $query->fetchAll();}
                else{
                    return array(null);
                }
            }
            catch(Exception $e){
                return array(null);
            }
    }
    
    function getResultatsThresholdOfPerseption(PDO $database,int $id): array {
            try{

                $query = $database->prepare("SELECT A.id, A.test, A.timeline, A.value, B.type, B.unit,C.date,C.duration,C.score,C.testbed,C.pilot,C.instructor,C.sensor FROM results A JOIN psychotechnical_data B JOIN test C ON A.id=B.id AND A.test=C.id AND C.measured_data=B.id WHERE (C.pilot=? AND measured_data LIKE '3') ORDER BY date DESC");
                $query->execute(array($id));
                if($query->rowCount()>0){
                    return $query->fetchAll();}
                    else{
                        return array(null);
                    }
                }
                catch(Exception $e){
                    return array(null);
                }
       }



?>
