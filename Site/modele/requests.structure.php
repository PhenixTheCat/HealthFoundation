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

/**
 * Lance la recherche multicritère avec les critères dans les variables de session
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @return array : Retourne le resultat de la recherche
 */
function multiCriteriaRequestStructure(PDO $database) : array
{
	try
	{
		
		//importation des variables de session
		
		
		//importation des variables de session
		if(isset($_SESSION['nbCriteriaStructure']))
		{
			$nbCriteria = $_SESSION['nbCriteriaStructure'];
		}
		else
		{
			$nbCriteria = 0;
		}
		if(isset($_SESSION['criteriaTextStructure']))
		{
			$criteriaText = $_SESSION['criteriaTextStructure'];
		}
		else
		{
			$criteriaText = array();
		}
		if(isset($_SESSION['criteriaTypeStructure']))
		{
			$criteriaType = $_SESSION['criteriaTypeStructure'];
		}
		else
		{
			$criteriaType = array();
		}
		
		//Ecriture de la requête
		$requestText="SELECT structure.*,user.last_name,user.first_name FROM `structure`,user WHERE structure.referent=user.id";
		
		//Comptage du nombre de critère non vide
		$effectiveCriteria = 0;
		for($i=0;$i<$nbCriteria;$i++)
		{
			if(!empty($criteriaType[$i]) && !empty($criteriaText[$i]))
			{
				$effectiveCriteria++;
			}
		}
		
		//Ecriture de la requête
		if($effectiveCriteria >= 1)
		{
			$requestText .= " AND ";
			$criteriaDone = 0;
			for($i=0;$i<$nbCriteria;$i++)
			{
				if(!empty($criteriaType[$i]) && !empty($criteriaText[$i]))
				{
					switch($criteriaType[$i])
					{
						case "Name":
							$requestText .= "(name like '%$criteriaText[$i]%')";
							$criteriaDone++;
							break;
						case "Referent":
							$requestText .= "(last_name like '%$criteriaText[$i]%' ||first_name like '%$criteriaText[$i]%')";
							$criteriaDone++;
							break;
						case "Postcode":
							$requestText .= "(postcode like '%$criteriaText[$i]%')";
							$criteriaDone++;
							break;
						case "City":
							$requestText .= "(city like '%$criteriaText[$i]%')";
							$criteriaDone++;
							break;
						case "Country":
							$requestText .= "(country like '%$criteriaText[$i]%')";
							$criteriaDone++;
							break;
					}
					if($criteriaDone != $effectiveCriteria)
					{
						$requestText .= " AND ";
					}
					
					
				}
				
			}
		}
		$requestText .= " ORDER BY last_name ";
		
		$request = $database->prepare($requestText);
		$request->execute();
		return $request->fetchAll();
	}
	catch(Exception $e)
	{
		return array();
	}
}

?>