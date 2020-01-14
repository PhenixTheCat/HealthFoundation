<?php

// on récupère les requêtes génériques
include('requests.generiques.php');

//on définit le nom de la table
$table = "user";

// requêtes spécifiques à la table des utiliteurs

/**
 * Retourne l'utilisateur correspondant au mail et mot de passe en parametre
 * @param PDO $database : base de donnée (health_foundation.sql)
 * @param string $email : mail de l'utilisateur
 * @param string $password : mot de passe de l'utilisateur
 * @return array : Ligne de l'utilisateur de la base de donnée
 */
function findUserConnexion(PDO $database,string $email, $password) : array 
{

	
	$request = $database->query('SELECT * FROM user WHERE email=\''.$email.'\' AND password =\''.$password.'\'');
	if($data = $request->fetch())
	{
		return $data;
		
	}
	else
	{
		return array(null); // A verifier si ça fonctionne
	}
}

/**
 * Vérifie si le compte en parametre a validé son adresse mail
 * @param PDO $database : base de donnée (health_foundation.sql)
 * @param array $user : Utilisateur dont on veut vérifier la validité du compte (array retourné par la database)
 * @return bool : true si compte vérifié, false si compte non vérifié
 */
function verifyAccount(PDO $database,array $user) : bool
{
    
	$request = $database->query('SELECT id FROM user WHERE id=\''.$user['id'].'\' AND status = "A"');
	if($data = $request->fetch())
	{
		return true;
	}
	else
	{
		return false;
	}
}

/**
 * teste si l'email en parametre est déja dans la base de donnée ou s'il est libre (inscription)
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param string $email : Mail a tester
 * @return bool : true si le mail est présent dans la base, false s'il est libre
 */
function testEmailExist(PDO $database,string $email) : bool
{
    
	$request = $database->query("SELECT * FROM user WHERE email = '".$email."'");
	if($data = $request->fetch())
	{
		return true;
	}
	else
	{
		return false;
	}
	
}

/**
 * test si le code en parametre appartient a un instructeur (inscription)
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param string $code : code a tester
 * @return array : retourne l'instructeur qui possède le code (null si aucun instructeur n'a le code)
 */
function testCodeInstructor(PDO $database,string $code) : array
{
    try{
	$request = $database->query("SELECT * FROM user WHERE code = '".$code."'");
	if($data = $request->fetch())
	{
		return $data;
	}
	else
	{
		
		return array(null);
	}}
	catch(Exception $e){
		die("Erreur  : ".$e->getMessage()." Vérifiez dans le code source les instructions");
	}
	
}

/**
 * test si le code en parametre appartient a une structure (inscription)
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param string $code : code a tester
 * @return array : retourne la structure qui possède le code (null si aucun instructeur n'a le code)
 */
function testCodeStructure(PDO $database,string $code) : array
{
	try{
	$request = $database->query("SELECT * FROM structure WHERE code = '".$code."'");
	if($data = $request->fetch())
	{
		return $data;
	}
	else
	{
		
		return array(null);
	}
	}
	catch(Exception $e){
		die("Erreur  : ".$e->getMessage()." Vérifiez dans le code source les instructions");
	}
	
}



/**
 * Retourne le type de l'utilisatuer dont l'id est entrée en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : Id de l'utilisateur dont on veut récupérer le type
 * @return string : Retourne le type de l'utilisateur (administrator, instructor, pilot)
 * retourne null si l'utilisateur n'existe pas
 */
function getUserType(PDO $database,int $userID)
{
    
	$request = $database->query("SELECT * FROM user WHERE id = '".$userID."'");
	if($data = $request->fetch())
	{
		return $data['type'];
	}
	else
	{//tester si ça marche avec null
		return null;
	}
}

/**
 * Ajoute un utilisatuer dans la base de donnée avec ses données entrées en parametre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param array $data : Données de l'utilisateur à rentrer dans la base de donnée
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function addUser(PDO $database,array $data) : bool
{
	try
	{

        
		$request = $database->prepare('INSERT INTO user (`id`,`sex`,`first_name`, `last_name`, `type`, `email`, `password`, `birthdate`, `instructor`, `structure`, `adress`, `city`, `postecode`, `country`, `phone_number`, `code`, `status`, `validation_key`) VALUES (0,?, ?, ?, ?, ?, ?, ?,?,?, ?, ?, ?, ?, ?,"","P",?)');
		$request->execute($data);
		return true;
	}
	catch(Exception $error)
	{
		die("Erreur lors de l'insertion de la question : ".$error->getMessage()." Vérifiez dans le code source les instructions");
		return false;
	}
}

/**
 * Change le mot de passe de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le mot de passe
 * @param string $newPassword : Nouveau mot de passe de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changePassword(PDO $database,int $userID, string $newPassword) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET password =? WHERE  id =?');
		$request->execute(array($newPassword,$userID));
		return true;
	}
	catch(Exception $error)
	{
		die("Erreur lors de l'insertion de la question : ".$error->getMessage()." Vérifiez dans le code source les instructions");
  return false;
		return false;
	}
}

/**
 * Change le prénom de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le prénom
 * @param string $newFirstName : Nouveau prénom de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeFirstName(PDO $database,int $userID, string $newFirstName) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET first_name =? WHERE  id =?');
		$request->execute(array($newFirstName,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le nom de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le nom
 * @param string $newLastName : Nouveau nom de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeLastName(PDO $database,int $userID, string $newLastName) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET last_name =? WHERE  id =?');
		$request->execute(array($newLastName,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le type de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le type
 * @param string $newType : Nouveau type de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeType(PDO $database,int $userID, string $newType) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET type =? WHERE  id =?');
		$request->execute(array($newType,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le mail de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier l'email
 * @param string $newEmail : Nouveau mail de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeEmail(PDO $database,int $userID, string $newEmail) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET email =? WHERE  id =?');
		$request->execute(array($newEmail,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change la date de naissance de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier la date de naissance
 * @param date $newBirthDate : Nouvelle date de naissance de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeBirthDate(PDO $database,int $userID,string $newBirthDate) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET birthdate =? WHERE  id =?');
		$request->execute(array($newBirthDate,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change l'id de l'instructeur de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier l'instructeur
 * @param int $newInstructorID : Nouvel instructeur de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeInstructor(PDO $database,int $userID, int $newInstructorID) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET instrucor =? WHERE  id =?');
		$request->execute(array($newInstructorID,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change l'id de la structure de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier la structure
 * @param int $newStructureID : Nouvelle structure de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeStructure(PDO $database,int $userID, int $newStructureID) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET structure  =? WHERE  id =?');
		$request->execute(array($newStructureID,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change l'adresse de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier l'adresse
 * @param int $newAddress : Nouvelle adresse de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeAddress(PDO $database,int $userID, string $newAddress) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET adress  =? WHERE  id =?');
		$request->execute(array($newAddress,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change la ville de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier la ville
 * @param int $newCity : Nouvelle ville de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeCity(PDO $database,int $userID, string $newCity) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET city  =? WHERE  id =?');
		$request->execute(array($newCity,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le code postal de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le code postal
 * @param int $newPostCode : Nouveau code postal de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changePostCode(PDO $database,int $userID, int $newPostCode) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET postecode  =? WHERE  id =?');
		$request->execute(array($newPostCode,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le pays de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le pays
 * @param int $newCountry : Nouveau pays de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeCountry(PDO $database,int $userID, string $newCountry) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET country  =? WHERE  id =?');
		$request->execute(array($newCountry,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le numero de telephone de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le numero de telephone
 * @param int $newPhoneNumber : Nouveau numero de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changePhoneNumber(PDO $database,int $userID, int $newPhoneNumber) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET phone_number  =? WHERE  id =?');
		$request->execute(array($newPhoneNumber,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le code de l'utilisateur dont l'ID est en paramètre (si c'est un formateur)
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le code de telephone
 * @param int $newCode : Nouveau code de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeCode(PDO $database,int $userID, string $newCode) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET code  =? WHERE  id =?');
		$request->execute(array($newCode,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change le status du compte de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier le status
 * @param int $newStatus : Nouveau statut de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeStatus(PDO $database,int $userID, string $newStatus) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET status  =? WHERE  id =?');
		$request->execute(array($newStatus,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change la clef d'inscription du compte de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier la clef d'inscription
 * @param int $newValidationKey : Nouvelle clef d'inscription de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function changeValidationKey(PDO $database,int $userID, string $newValidationKey) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET validation_key  =? WHERE  id =?');
		$request->execute(array($newValidationKey,$userID));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

/**
 * Change la clef d'inscription du compte de l'utilisateur dont l'ID est en paramètre
 * @param PDO $database : Base de donnée (health_foundation.sql)
 * @param int $userID : ID de l'utilisateur dont on veut modifier la clef d'inscription
 * @param int $newValidationKey : Nouvelle clef d'inscription de l'utilisateur
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function resetPassword(PDO $database,string $email, string $newPassword) : bool
{
	try
	{
        
		$request = $database->prepare('UPDATE user SET password  =? WHERE  email =?');
		$request->execute(array($newPassword,$email));
		return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

function getUser(PDO $database)
{
	try
	{
        
	$requser = $database->prepare("SELECT * FROM `user` ORDER BY `user`.`last_name` ASC");
    $requser->execute();
    return $requser->fetchAll();
	}
	catch(Exception $e)
	{
		return array(null);
	}
}

function getOneUser(PDO $database,int $id)
{
	try
	{
        
	$requser = $database->prepare("SELECT * FROM user WHERE id = ?");
    $requser->execute(array($id));
    return $requser->fetchAll();
	}
	catch(Exception $e)
	{
		return array(null);
	}
}

function getUserByInstructor(PDO $database,$instructorId)
{
	try
	{
        
	$requser = $database->prepare("SELECT * FROM user WHERE instructor = ? ORDER BY last_name");
    $requser->execute(array($instructorId));
    return $requser->fetchAll();
	}
	catch(Exception $e)
	{
		return array(null);
	}
}

function getUserNotValidated(PDO $database,$instructorId)
{
	try
	{
        
	$requser = $database->prepare("SELECT * FROM user WHERE instructor = ? && status =?");
    $requser->execute(array($instructorId,'M'));
    return $requser->fetchAll();
	}
	catch(Exception $e)
	{
		return array(null);
	}
}
function validateUser(PDO $database,$userId)
{
	try
	{
        
	$requser = $database->prepare("UPDATE user SET status =? WHERE  id =?");
    $requser->execute(array('A',$userId));
    return true;
	}
	catch(Exception $e)
	{
		return false;
	}
}

function getUserByNameByInstructor(PDO $database,$instructorId,$search)
{
	try
	{
		$requser = $database->prepare("SELECT * FROM user where (last_name like '$search%' ||first_name like '$search%' && instructor= ?) ORDER BY last_name ");
		$requser->execute(array($instructorId));
		return $requser->fetchAll();
        
	}
	catch(Exception $e)
	{
		return array(null);
	}
}

function getUserInfo(PDO $database,int $userId)
{
	try
	{
		$requser = $database->prepare("SELECT * FROM user where id =?");
		$requser->execute(array($userId));
		return $requser->fetch();
        
	}
	catch(Exception $e)
	{
		return null;
	}
}

function validationKey(PDO $database,$email,$code)
{
	try
	{
		$requete = $database->query('SELECT id FROM user WHERE  email=\''.$email.'\'');
        if($requete->fetch())
        {
        $reqCode = $database->prepare('UPDATE user SET validation_key=? WHERE  email =?');
        $reqCode->execute(array($code,$email));}
		return true;
        
	}
	catch(Exception $e)
	{
		return false;
	}
}

function mailValidated(PDO $database,string $code){
	try{
	$reqcode = $database->prepare('UPDATE user SET status =? WHERE  validation_key =?');
	$reqcode ->execute(array("M",$code)); //M status pour le mail validé mais pas par le formateur
	return true;
	}
	catch(Exception $e){
		return false;
	}
}

function getStructureByCode(PDO $database,string $code)
{
	try
	{
		if($_SESSION['signupCodeType'] = "structure"){
		$requser = $database->prepare("SELECT * FROM structure where code =?  ");
		$requser->execute(array($code));
		return $requser->fetch();
		}
		else if($_SESSION['signupCodeType'] = "instructor"){
		$requser = $database->prepare("SELECT * FROM user where code =? ");
		$requser->execute(array($code));
		return $requser->fetch();
		}
	}
	catch(Exception $e)
	{
		die("Erreur : ".$e->getMessage()." Vérifiez dans le code source les instructions");
		return null;
	}
}


function getInstructorByCode(PDO $database,string $code)
{
	try
	{
		if($_SESSION['signupCodeType'] = "instructor"){
		$requser = $database->prepare("SELECT id FROM user where code =? ");
		$requser->execute(array($code));
		return $requser->fetch();
		}
	}
	catch(Exception $e)
	{
		die("Erreur  : ".$e->getMessage()." Vérifiez dans le code source les instructions");
		return null;
	}
}

function searchUserByName(PDO $database,$search){

		try
		{
			$requser = $database->prepare("SELECT * FROM user where (last_name like '$search%' ||first_name like '$search%') ORDER BY last_name ");
			$requser->execute();
			return $requser->fetchAll();
			
		}
		catch(Exception $e)
		{
			return array(null);
		}
}

function deleteUser(PDO $database,int $id) {
    try{
	$requete = $database->prepare("DELETE FROM user WHERE id = ? ");
	$requete->execute(array($id));
	return true;
	}
	catch(Exception $e)
		{
			return array(null);
		}
    
}

function banUser(PDO $database,int $id){
	try{
		$requete = $database->prepare("UPDATE user SET status = \"B\" WHERE id =? ");
		$requete->execute(array($id));
		return true;
		}
		catch(Exception $e)
			{
				return array(null);
			}
}

function passUserToReferent(PDO $database,int $id){
	try{
		$requete = $database->prepare("UPDATE structure SET referent = ? WHERE id = (SELECT structure from user WHERE id =?) ");
		$requete->execute(array($id,$id));
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
 * @return bool : Retourne true si la requete a réussi, false si elle a échoué
 */
function multiCriteriaRequest(PDO $database) : array
{
	try
	{
		
		//importation des variables de session
		$nbCriteria = $_SESSION['nbCriteria'];
		$criteriaText = $_SESSION['criteriaText'];
		$criteriaType = $_SESSION['criteriaType'];
		
		//Ecriture de la requête
		$requestText="SELECT * FROM user";
		
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
			$requestText .= " WHERE ";
			$criteriaDone = 0;
			for($i=0;$i<$nbCriteria;$i++)
			{
				if(!empty($criteriaType[$i]) && !empty($criteriaText[$i]))
				{
					switch($criteriaType[$i])
					{
						case "Name":
							$requestText .= "(last_name like '%$criteriaText[$i]%' ||first_name like '%$criteriaText[$i]%')";
							$criteriaDone++;
							break;
						case "Type":
							$requestText .= "(type like '%$criteriaText[$i]%')";
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
						case "Structure":
							$requestText .= "(structure like '%$criteriaText[$i]%')";
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
