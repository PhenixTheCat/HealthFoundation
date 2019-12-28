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
        $request = $database->prepare("SELECT timeline FROM results WHERE test=(SELECT id FROM test WHERE (pilot =? && measured_data=?))");
    
        $request->execute(array($pilotId,$testId));
        if ($request->rowCount() > 0) {
        return $request->fetchAll(PDO::FETCH_COLUMN, 0);}
        else{
            return array(null);
        }
    }

        catch(Exception $e){
            return array(null);
        }
}

function getTestValue($database,$pilotId,$testId){
    try{
        $request = $database->prepare("SELECT value FROM results WHERE test=(SELECT id FROM test WHERE (pilot =? && measured_data=?))");
    
        $request->execute(array($pilotId,$testId));

        if ($request->rowCount() > 0) {
            return $request->fetchAll(PDO::FETCH_COLUMN, 0);}
            else{
                return array(null);
            }
        }

        catch(Exception $e){
            return array(null);
        }
}




?>
