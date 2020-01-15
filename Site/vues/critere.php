<?php
session_start();



//Récupère  les données envoyées par le javascript
$value = $_POST["value"];
$memory = $_POST["memoryFields"];
$memoryTypes = $_POST["memoryTypes"];
$selectedCriteria = $_POST["selectedCriteria"];
//actualise le nombre de critères
$_SESSION["nbCriteria"] += $value;

if(!isset($_SESSION['criteriaText'][0]))
{
	$_SESSION['criteriaText'][0] = "";
}
if(!isset($_SESSION['criteriaType'][0]))
{
	$_SESSION['criteriaType'][0] = "";
}

if($_SESSION["nbCriteria"]<=0)
{
	$_SESSION["nbCriteria"] = 1;
}

if($_POST['firstLoad']=="false")
{
	//décode le tableau JSON de la mémoire des critères
	$criteriaMemory = json_decode($memory);
	$criteriaType = json_decode($memoryTypes);
}
else
{
	
	$criteriaMemory = $_SESSION['criteriaText'];
	$criteriaType = $_SESSION['criteriaType'];
	
}





//Permet d'éviter les erreurs lorsque l'on ajoute une nouvelle ligne (out of bounds)
if(!is_null($criteriaMemory))
{
	array_push($criteriaMemory,"");

}
if(!is_null($criteriaType))
{
	array_push($criteriaType,"");

}

if($value == 1)
{
	
}
else if($value == -1)
{
	$_SESSION['criteriaText'][$_SESSION["nbCriteria"]] = ""; 
	for($i=0;$i<$_SESSION["nbCriteria"];$i++)
	{
		if($i >= $selectedCriteria)
		{
			$criteriaMemory[$i] = $criteriaMemory[$i+1];
			$criteriaType[$i] = $criteriaType[$i+1];
		}
	}
}

//Affichage des zones de critère avec les mémoires
for($i=0;$i<$_SESSION["nbCriteria"];$i++) {
	if(!isset($_SESSION['criteriaText'][$i]))
	{
		$_SESSION['criteriaText'][$i] = "";
	}
	$_SESSION['criteriaText'][$i] = $criteriaMemory[$i];
	$_SESSION['criteriaType'][$i] = $criteriaType[$i];
	?>
	<input id="search" class="criteriaSearch" name="Text<?php echo($i)?>" type="text" placeholder="Rechercher" value = "<?php echo($_SESSION['criteriaText'][$i]) ?>" />
	<?php if($i == $_SESSION["nbCriteria"]-1) {?>
	
	<input class="criteriasButton" id="Boutton" type="button" value="Ajouter un critère" onclick="showCriterias(1,<?php echo($_SESSION["nbCriteria"]);?>,false,<?php echo($i)?>)" />
	<?php }?>
	<?php if($i != $_SESSION["nbCriteria"]-1) {?>
	<input class="criteriasButton" id="Boutton" type="button" value="Retirer le critère" onclick="showCriterias(-1,<?php echo($_SESSION["nbCriteria"]);?>,false,<?php echo($i)?>)" />
	<?php }?>
	<div class="multiCritereRadio">
		<input type="radio" id="Name<?php echo($i)?>" name="<?php echo($i)?>" value="Name" <?php if($criteriaType[$i] == "Name") { echo("checked");} ?> >
		<label for="Name<?php echo($i)?>">Nom</label>
		
		<input type="radio" id="Type<?php echo($i)?>" name="<?php echo($i)?>" value="Type" <?php if($criteriaType[$i] == "Type") { echo("checked");} ?>>
		<label for="Type<?php echo($i)?>">Type</label>
		
		<input type="radio" id="Structure<?php echo($i)?>" name="<?php echo($i)?>" value="Structure" <?php if($criteriaType[$i] == "Structure") { echo("checked");} ?> >
		<label for="Structure<?php echo($i)?>">Structure</label>
		
		<input type="radio" id="City<?php echo($i)?>" name="<?php echo($i)?>" value="City"<?php if($criteriaType[$i] == "City") { echo("checked");} ?>>
		<label for="City<?php echo($i)?>">Ville</label>
		
		<input type="radio" id="Country<?php echo($i)?>" name="<?php echo($i)?>" value="Country" <?php if($criteriaType[$i] == "Country") { echo("checked");} ?>>
		<label for="Country<?php echo($i)?>">Pays</label>
		
	</div>
	
	
<?php }

?>

	