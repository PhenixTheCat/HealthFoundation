<?php


function connectdb(){
try{	
	//connexion à la database	
	//Pour les user Mac : entrez cette ligne	
	//$database = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');	
    //Pour windows entrez cette ligne	
    	
	if (getOS( $_SERVER['HTTP_USER_AGENT'])=='Windows' || getOS( $_SERVER['HTTP_USER_AGENT'])=='Linux')	
	{	
        $database = new PDO('mysql:host=localhost;dbname=health_foundation','root','');	
		$database-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
		return $database;
	}	
	elseif (getOS( $_SERVER['HTTP_USER_AGENT'])=='Mac')	
	{	
        $database = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');	
		$database-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
		return $database;
	}	
}	
catch(Exception $error)	
{	
	die('Erreur lors du chargement de la base de donnée : '.$error->getMessage().' Vérifiez dans le code source les instructions');	
}
}
?>