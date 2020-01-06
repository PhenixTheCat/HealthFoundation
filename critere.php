<?php
session_start();
//Récupère  les données envoyées par le javascript
$value = $_POST["value"];
$memory = $_POST["memory"];

//actualise le nombre de critères
$_SESSION["nbCriteria"] += $value;
if($_SESSION["nbCriteria"]<=0)
{
	$_SESSION["nbCriteria"] = 1;
}

//décode le tableau JSON de la mémoire des critères
$criteriaMemory = json_decode($memory);


//Permet d'éciter les erreurs lorsque l'on ajoute une nouvelle ligne (out of bounds)
if(!is_null($criteriaMemory))
{
	array_push($criteriaMemory,"");

}


if($value == 1)
{
	
}
else if($value == -1)
{
	//TODO recuperer la suppression du bon critère et faire le type de critère + requete
	$_SESSION['criteriaText'][$_SESSION["nbCriteria"]] = ""; 
}

//Affichage des zones de critère avec les mémoires
for($i=0;$i<$_SESSION["nbCriteria"];$i++) {
	if(!isset($_SESSION['criteriaText'][$i]))
	{
		$_SESSION['criteriaText'][$i] = "";
	}
	$_SESSION['criteriaText'][$i] = $criteriaMemory[$i];

	?>
	<input id="search" name=<?php echo($i)?> type="text" placeholder="Rechercher" value = "<?php echo($_SESSION['criteriaText'][$i]) ?>" />
	<?php if($i == $_SESSION["nbCriteria"]-1) {?>
	
	<input id="Boutton" type="button" value="Ajouter un critère" onclick="showCriterias(1,<?php echo($_SESSION["nbCriteria"]);?>,false)" />
	<?php }?>
	<?php if($i != $_SESSION["nbCriteria"]-1) {?>
	<input id="Boutton" type="button" value="Retirer le critère" onclick="showCriterias(-1,<?php echo($_SESSION["nbCriteria"]);?>,false)" />
	<?php }?>
	
	
<?php }
?>