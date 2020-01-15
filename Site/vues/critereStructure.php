<?php
session_start();



//Récupère  les données envoyées par le javascript
$value = $_POST["value"];
$memory = $_POST["memoryFields"];
$memoryTypes = $_POST["memoryTypes"];
$selectedCriteria = $_POST["selectedCriteria"];
//actualise le nombre de critères
$_SESSION["nbCriteriaStructure"] += $value;

if(!isset($_SESSION['criteriaTextStructure'][0]))
{
	$_SESSION['criteriaTextStructure'][0] = "";
}
if(!isset($_SESSION['criteriaTypeStructure'][0]))
{
	$_SESSION['criteriaTypeStructure'][0] = "";
}

if($_SESSION["nbCriteriaStructure"]<=0)
{
	$_SESSION["nbCriteriaStructure"] = 1;
}

if($_POST['firstLoad']=="false")
{
	//décode le tableau JSON de la mémoire des critères
	$criteriaMemory = json_decode($memory);
	$criteriaType = json_decode($memoryTypes);
}
else
{
	
	$criteriaMemory = $_SESSION['criteriaTextStructure'];
	$criteriaType = $_SESSION['criteriaTypeStructure'];
	
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
	$_SESSION['criteriaTextStructure'][$_SESSION["nbCriteriaStructure"]] = ""; 
	for($i=0;$i<$_SESSION["nbCriteriaStructure"];$i++)
	{
		if($i >= $selectedCriteria)
		{
			$criteriaMemory[$i] = $criteriaMemory[$i+1];
			$criteriaType[$i] = $criteriaType[$i+1];
		}
	}
}

//Affichage des zones de critère avec les mémoires
for($i=0;$i<$_SESSION["nbCriteriaStructure"];$i++) {
	if(!isset($_SESSION['criteriaTextStructure'][$i]))
	{
		$_SESSION['criteriaTextStructure'][$i] = "";
	}
	$_SESSION['criteriaTextStructure'][$i] = $criteriaMemory[$i];
	$_SESSION['criteriaTypeStructure'][$i] = $criteriaType[$i];
	?>
	<input id="search" class="criteriaSearch" name="Text<?php echo($i)?>" type="text" placeholder="Rechercher" value = "<?php echo($_SESSION['criteriaTextStructure'][$i]) ?>" />
	<?php if($i == $_SESSION["nbCriteriaStructure"]-1) {?>
	
	<input class="criteriasButton" id="Boutton" type="button" value="Ajouter un critère" onclick="showCriterias(1,<?php echo($_SESSION["nbCriteriaStructure"]);?>,false,<?php echo($i)?>)" />
	<?php }?>
	<?php if($i != $_SESSION["nbCriteriaStructure"]-1) {?>
	<input class="criteriasButton" id="Boutton" type="button" value="Retirer le critère" onclick="showCriterias(-1,<?php echo($_SESSION["nbCriteriaStructure"]);?>,false,<?php echo($i)?>)" />
	<?php }?>
	<div class="multiCritereRadio">
		<input type="radio" id="Name<?php echo($i)?>" name="<?php echo($i)?>" value="Name" <?php if($criteriaType[$i] == "Name") { echo("checked");} ?> >
		<label for="Name<?php echo($i)?>">Nom</label>
		
		<input type="radio" id="Referent<?php echo($i)?>" name="<?php echo($i)?>" value="Referent" <?php if($criteriaType[$i] == "Referent") { echo("checked");} ?>>
		<label for="Referent<?php echo($i)?>">Référent</label>
		
		<input type="radio" id="Postcode<?php echo($i)?>" name="<?php echo($i)?>" value="Postcode" <?php if($criteriaType[$i] == "Postcode") { echo("checked");} ?> >
		<label for="Postcode<?php echo($i)?>">Code Postal</label>
		
		<input type="radio" id="City<?php echo($i)?>" name="<?php echo($i)?>" value="City"<?php if($criteriaType[$i] == "City") { echo("checked");} ?>>
		<label for="City<?php echo($i)?>">Ville</label>
		
		<input type="radio" id="Country<?php echo($i)?>" name="<?php echo($i)?>" value="Country" <?php if($criteriaType[$i] == "Country") { echo("checked");} ?>>
		<label for="Country<?php echo($i)?>">Pays</label>
		
	</div>
	
	
<?php }

?>

	