<?php



//on définit le nom de la table
$table = "structure";

// requêtes spécifiques à la table des structures

/*
*
*@param PDO $database
*/
function searchStructureCode(PDO $database, string $code):array{
    try{
    $requete = $database->query("SELECT * FROM structure WHERE code = '".$code."'");
    return $requete->fetch();   
    }
catch(Exception $error)
{
	die('Erreur lors de la recherche du code structure : '.$error->getMessage().' Vérifiez dans le code source les instructions');
}    
}

function insertStructure(PDO $database,array $data){
    try{
    $reqStructure = $database->prepare("INSERT INTO `structure`(`id`, `name`, `referent`, `address`, `city`, `postcode`, `country`, `phone_number`, `code`) VALUES (0,?,NULL,?,?,?,?,?,?,'Active')");
    $reqStructure->execute($data);
    return true;
        }
catch(Exception $error)
{
	return false;
}
}

function searchStructureByName(PDO $database,$search){

    try
    {
        $requser = $database->prepare("SELECT * FROM structure where (name like '$search%') ORDER BY last_name");
        $requser->execute();
        return $requser->fetchAll();
        
    }
    catch(Exception $e)
    {
        return array(null);
    }
}


function deleteStructure(PDO $database,int $id) {
    try{

    $reqDelete = $database->prepare("DELETE FROM structure WHERE id = ?");
    $reqDelete ->execute(array($id));
    return true;
    }
    catch(Exception $error)
    {
        return false;
    }
    
    }   

function getStructure(PDO $database){
try
	{
        
	$reqStructure = $database->prepare("SELECT * FROM `structure` ORDER BY `structure`.`name` ASC");
    $reqStructure->execute();
    return $reqStructure->fetchAll();
	}
catch(Exception $e)
	{
		return array(null);
	}

    }
 
function changeCodeStructure(PDO $database,int $userID, string $newCode) : bool
{
    try
    {
        
        $request = $database->prepare('UPDATE structure SET code  =? WHERE  id =?');
        $request->execute(array($newCode,$userID));
        return true;
    }
    catch(Exception $e)
    {
        return false;
    }
}   

function getReferentNotValidated(PDO $database)
{
	try
	{
        
	$requser = $database->prepare("SELECT * FROM user WHERE id in(SELECT referent FROM structure) && status =? ");
    $requser->execute(array('M'));
    return $requser->fetchAll();
	}
	catch(Exception $e)
	{
		return array(null);
	}
}

function passStructureToInactive(PDO $database,$id){
    try{
    $requser = $database->prepare("UPDATE structure SET status =? WHERE id=? ");
    $requser->execute(array("Inactive",$id));
    return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}
?>