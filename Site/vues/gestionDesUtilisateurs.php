<?php
/*


}*/
//echo($_SESSION["nbCriteria"]-1));
echo($_SESSION["nbCriteria"]);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<script>
		function showCriterias(value, nbCriteria, firstLoading)
		{
			
			var textFieldsValue = new Array();
			var test = "";
			var jsonArray = "";
			
			//Exécuté lorsque l'utilisateur clique sur un bouton ajouter ou retirer
			if(firstLoading == false)
			{
				//Enregistrement des critères déja entrés
				for(var i = 0;i<nbCriteria;i++)
				{
					textFieldsValue = textFieldsValue.concat(document.getElementsByTagName("input")[2*i].value);
				}
				jsonArray = JSON.stringify(textFieldsValue);
			}
			
			//Initialise la requete HTTP
			if (window.XMLHttpRequest) {
				xmlhttp= new XMLHttpRequest();
			} else {
				if (window.ActiveXObject)
					try {
						xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
						try {
							xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
						} catch (e) {
							return NULL;
						}
					}
			}
			
			//Executé une fois la page critere AJAX chargée
			xmlhttp.onreadystatechange = function ()
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById("Criterias").innerHTML = xmlhttp.responseText;
					
				}
			}

			//Chargement de la page critere AJAX
			xmlhttp.open("POST", "vues/critere.php", true);
			
			//Envoi de la requete
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send("value="+value+"&memory="+jsonArray);
			
			
		}
		
		
	</script>
  </head>
  <body>

  <?php //Si l'utilisateur est connecté
    if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?> 
     <div class="headerContact">
    <h1> Gestion des utilisateurs</h1>
  </div>

    
    <?php echo printError($error); ?>
	<div class="formulaireRecherche">  
		<form action="" id="searchUser" method="post" onsubmit=''>
		<script>showCriterias(1,1,true);</script>

		<div id="Criterias"><b></b></div>
	</div>

		
    </form>
	
<table border="1">
    <thead>
    <tr>
        <th>Nom </th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th> Type </th>
        <th>Gestion</th>
    </tr>
    </thead>
    </table>

  </div> 
  <?php endif;?>
	<script src="script.js"></script>
  </body>
</html>
