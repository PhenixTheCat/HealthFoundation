<?php




?>
<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<script>
		function showCriterias(value, nbCriteria, firstLoading, selectedCriteria)
		{
			
			var textFieldsValue = new Array();
			var checkboxValue = new Array();
			var test = "";
			var fieldsArray = "";
			var typesArray = "";
			//Exécuté lorsque l'utilisateur clique sur un bouton ajouter ou retirer
			if(firstLoading == false)
			{
				//Enregistrement des critères déja entrés
				for(var i = 0;i<nbCriteria;i++)
				{
					//enregistrement des valeurs de critères
					textFieldsValue = textFieldsValue.concat(document.getElementsByTagName("input")[7*i].value);
					
					//enregistrement du type de critère
					if(document.getElementsByTagName("input")[7*i+2].checked)
					{
						checkboxValue = checkboxValue.concat("Name");
					}
					else if(document.getElementsByTagName("input")[7*i+3].checked)
					{
						checkboxValue = checkboxValue.concat("Type");
					}
					else if(document.getElementsByTagName("input")[7*i+4].checked)
					{
						checkboxValue = checkboxValue.concat("Structure");
					}
					else if(document.getElementsByTagName("input")[7*i+5].checked)
					{
						checkboxValue = checkboxValue.concat("City");
					}
					else if(document.getElementsByTagName("input")[7*i+6].checked)
					{
						checkboxValue = checkboxValue.concat("Country");
					}
					else{
						checkboxValue = checkboxValue.concat("NULL");
					}
					
				}
				fieldsArray = JSON.stringify(textFieldsValue);
				typesArray = JSON.stringify(checkboxValue);
				
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
			xmlhttp.send("value="+value+"&memoryFields="+fieldsArray+"&memoryTypes="+typesArray+"&selectedCriteria="+selectedCriteria+"&firstLoad="+firstLoading);
			
			
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
		<form action=""  method="post" >
			<div class="criterias">
		<script>showCriterias(0,1,true,0);</script>
		</div>
		<div id="Criterias" class = "Criterias"><b></b></div>
		<button class ="submitButtons" type="submit" value = "Research" name="Research">Rechercher</button>
		</form>
		<table border="1">	
		  <thead>
			<tr>
			  <th>Sexe</th>
			  <th>Nom </th>
			  <th>Prénom</th>  
			  <th>Date de naissance</th>
			  <th>Type </th>
			  <th>Structure</th>
			  <th>Statut </th>

			  <th>Gestion</th>
			</tr>
		  </thead>
		  <tbody>
        <?php if(isset($_POST['rechercher'])) { ?>
        <?php foreach ($users as $user) { ?>

        <tr>
		<td><php><?php echo $user['sex']; ?></php></td>
          <td> <?php echo $user['last_name'] ?></td>
          <td> <?php echo $user['first_name'] ?></td>
		 
          <td> <?php echo $user['birthdate'] ?></td>
          <td> <?php echo $user['type'] ?></td>
          <td> <?php echo $user['structureName'] ?></td>
          <td> <?php echo $user['status'] ?></td>
          <td>
            <form action="" id="searchUser" method="post">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

              <input class="gestionButtons" type="submit" name="delete" value="Supprimer" /> </br>
              <input class="gestionButtons" type="submit" name="block" value="Bannir" /> </br>
              <input class="gestionButtons" type="submit" name="referent" value="Passer en référent" /> </br>
            </form>
          </td>
        </tr>

        <?php 
    }
    }
    else 
        { ?>
        <?php foreach ($users as $user) { ?>

        <tr>
		<td><php><?php echo $user['sex']; ?></php></td>
          <td> <?php echo $user['last_name'] ?></td>
		  <td> <?php echo $user['first_name'] ?></td>
		
          <td> <?php echo $user['birthdate'] ?></td>
          <td> <?php echo $user['type'] ?></td>
          <td> <?php echo $user['structureName'] ?></td>
          <td> <?php echo $user['status'] ?></td>
          <td>
            <form action="" id="searchUser" method="post">
              <input class="gestionButtons" type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <input class="gestionButtons" type="submit" name="delete" value="Supprimer" /> </br>
              <input class="gestionButtons" type="submit" name="block" value="Bannir" /> </br>

              <input class="gestionButtons" type="submit" name="referent" value="Passer en référent" /> </br>

              <input  type="email" name="newMail" >

              <input class="gestionButtons" type="submit" name="email" value="Changer le mail" /> </br>

            </form>
          </td>

        </tr>
        <?php
        }
    }


        ?>
      </tbody>
		</table>
	</div>

		
    


  </div> 
  <?php endif;?>
	<script src="script.js"></script>
  </body>
</html>
