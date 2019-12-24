<?php



//on définit le nom de la table
$table = "test";

// requêtes spécifiques à la table des tests réalisés par les utilisateurs


function getTestAVGPerGender(PDO $database,$gender,$testId,$instructorId){
    try{
        $request = $database->prepare("SELECT AVG(score) AS avggender FROM test WHERE (pilot IN (SELECT id FROM user WHERE sex =?) && `measured_data` =? && instructor=?)");
        $request->execute(array($gender,$testId,$instructorId));

        return $request->fetch();}

        catch(Exception $e){
            return array(0);
        }

}

function getTestTimeline($database,$pilotId,$testId){
    try{
        $request = $database->prepare("SELECT timeline,value FROM results WHERE test=(SELECT id FROM test WHERE (pilot =? && measured_data=?))");
    
        $request->execute(array($pilotId,$testId));

        return $request->fetchAll();}

        catch(Exception $e){
            return array(null);
        }
}




?>
