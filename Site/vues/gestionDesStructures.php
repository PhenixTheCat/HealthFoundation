<?php
/*


}*/
?>
<!DOCTYPE html>
<html>

<head>
  <title>APP</title>
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
						checkboxValue = checkboxValue.concat("Referent");
					}
					else if(document.getElementsByTagName("input")[7*i+4].checked)
					{
						checkboxValue = checkboxValue.concat("Postcode");
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
			xmlhttp.open("POST", "vues/critereStructure.php", true);
			
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
    <h1> Gestion des structures</h1>
  </div>
  <div class="resultatsParCat">
    </form>

    <h3> Compte(s) à valider </h3>
    <?php  if(!empty($userToValidate)) { ?>
    <table border="1" class="validerCompte">
      <thead>
        <tr>
          <th>Nom </th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>Type</th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($userToValidate as $user) { ?>
        <tr>
          <td>
            <php><?php echo $user['last_name']; ?></php>
          </td>
          <td>
            <php><?php echo $user['first_name']; ?></php>
          </td>
          <!-- <td><php><?php //echo $user['sex']; ?></php></td> -->
          <td>
            <php><?php echo $user['birthdate']; ?></php>
          </td>
          <td>
            <php><?php echo $user['type']; ?></php>
          </td>


          <form></form>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <input class="gestionButtons" type="submit" name="activate" value="Valider l'inscription">
              <input class="gestionButtons" type="submit" name="delete" value="Supprimer">
            </form>

          </td>

        </tr>

        <?php } ?>
        <?php }
    else{ ?>
        <h3>Pas d'utilisateur à valider</h3>

        <?php }?>
      </tbody>
    </table>
  </div>

  <div class="formulaireContact">
    <?php echo printError($error); ?>
    <form action=""  method="post" >
		<script>showCriterias(0,1,true,0);</script>

		<div id="Criterias" class = "Criterias"><b></b></div>
		<button class="submitButtons" type = "submit" value = "Research" name="Research">Rechercher</button>
	</form>


    <a class="submitButtons" href="index.php?redirect=structure&function=ajouterUneStructure">Ajouter une structure</a>



    <table border="1">
      <thead>
        <tr>
          <th>ID </th>
          <th>Nom </th>
          <th>Référent</th>
          <th>Adresse</th>
          <th>Ville </th>
          <th>Code postal</th>
          <th>Pays</th>
          <th>Numéro de telephone</th>
          <th>Code</th>
          <th>Statut</th>
          <th>Gestion</th>


        </tr>
      </thead>
      <tbody>
        <?php  if(isset($_POST['Research'])) { ?>
        <?php foreach ($structures as $struc) { ?>

        <tr>
          <td> <?php echo $struc['id'] ?></td>
          <td> <?php echo $struc['name'] ?></td>
          <td> <?php echo $struc['last_name'].' '.$struc['first_name'] ?></td>
          <td> <?php echo $struc['address'] ?></td>
          <td> <?php echo $struc['city'] ?></td>
          <td> <?php echo $struc['postcode'] ?></td>
          <td> <?php echo $struc['country'] ?></td>
          <td> <?php echo $struc['phone_number'] ?></td>
          <td> <?php echo $struc['code'] ?></td>
          <td><?php echo $struc['status']; ?></td>
          <td>
          <td>

            <form action="" id="searchUser" method="post">
              <input class="gestionButtons" type="hidden" name="id" value="<?php echo $struc['id'];?>">
              <input class="gestionButtons" type="submit" name="delete" value="Supprimer" /> </br>
              <input class="gestionButtons" type="submit" name="generateCode" value="Générer un code" /> </br>
              <input class="gestionButtons" type="submit" name="inactive" value="Marquer comme inactive" /> </br>

            </form>
          </td>
        </tr>

        <?php 
    }
    }
    else 
        { ?>
        <?php foreach ($structures as $struc) { ?>

        <tr>
          <td> <?php echo $struc['id'] ?></td>
          <td> <?php echo $struc['name'] ?></td>
          <td> <?php echo $struc['last_name'].' '.$struc['first_name'] ?></td>
          <td> <?php echo $struc['address'] ?></td>
          <td> <?php echo $struc['city'] ?></td>
          <td> <?php echo $struc['postcode'] ?></td>
          <td> <?php echo $struc['country'] ?></td>
          <td> <?php echo $struc['phone_number'] ?></td>
          <td> <?php echo $struc['code'] ?></td>
          <td><?php echo $struc['status']; ?></td>
          <td>
            <form action="" id="searchUser" method="post">
              <input  type="hidden" name="id" value="<?php echo $struc['id'];?>">
              <input class="gestionButtons" type="submit" name="delete" value="Supprimer" /> </br>
              <input class="gestionButtons" type="submit" name="generateCode" value="Générer un code" /> </br>
              <input class="gestionButtons" type="submit" name="inactive" value="Passer inactif" /> </br>

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


  <?php endif;?>
  <script src="script.js"></script>
</body>

</html>
