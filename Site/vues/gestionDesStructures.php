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
</head>

<body>

  <?php //Si l'utilisateur est connecté
    if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?>
  <div class="headerContact">
    <h1><?php echo _(" Gestion des structures");?></h1>
  </div>
  <div class="resultatsParCat">
    </form>

    <h3><?php echo _(" Compte(s) à valider ");?></h3>
    <?php  if(!empty($userToValidate)) { ?>
    <table border="1" class="validerCompte">
      <thead>
        <tr>
          <th><?php echo _("Nom ");?></th>
          <th><?php echo _("Prénom");?></th>
          <th><?php echo _("Date de naissance");?></th>
          <th><?php echo _("Type");?></th>
          <th><?php echo _("Statut");?></th>
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
              <input type="submit" name="activate" value=<?php echo _("Valider l'inscription");?></inpu>>
              <input type="submit" name="delete" value=<?php echo _("Supprimer");?></inpu>>
            </form>

          </td>

        </tr>

        <?php } ?>
        <?php }
    else{ ?>
        <h3><?php echo _("Pas d'utilisateur à valider");?></h3>

        <?php }?>
      </tbody>
    </table>
  </div>

  <div class="formulaireContact">
    <?php echo printError($error); ?>
    <form action="" id="searchUser" method="post">
      <input id="search" name="searchUser" type="text" placeholder=<?php echo _("Rechercher");?> />
      <input class="submitButtons" type="submit" name="rechercher" value=<?php echo _("Rechercher");?> />
    </form>


    <a class="editButtons" href="index.php?redirect=structure&function=ajouterUneStructure"><?php echo _("Ajouter une structure");?></a>



    <table border="1">
      <thead>
        <tr>
          <th><?php echo _("ID ");?></th>
          <th><?php echo _("Nom ");?></th>
          <th><?php echo _("Référent");?></th>
          <th><?php echo _("Adresse");?></th>
          <th><?php echo _("Ville ");?></th>
          <th><?php echo _("Code postal");?></th>
          <th><?php echo _("Pays");?></th>
          <th><?php echo _("Numéro de téléphone");?></th>
          <th><?php echo _("Code");?></th>
          <th><?php echo _("Statut");?></th>
          <th><?php echo _("Gestion");?></th>


        </tr>
      </thead>
      <tbody>
        <?php  if(isset($_POST['rechercher'])) { ?>
        <?php foreach ($structure as $struc) { ?>

        <tr>
          <td> <?php echo $struc['id'] ?></td>
          <td> <?php echo $struc['name'] ?></td>
          <td> <?php echo $struc['referent'] ?></td>
          <td> <?php echo $struc['address'] ?></td>
          <td> <?php echo $struc['city'] ?></td>
          <td> <?php echo $struc['postcode'] ?></td>
          <td> <?php echo $struc['country'] ?></td>
          <td> <?php echo $struc['phone_number'] ?></td>
          <td> <?php echo $struc['code'] ?></td>
          <td>
            <php><?php echo $struc['status']; ?></php>
          </td>
          <td>
          <td>

            <form action="" id="searchUser" method="post">
              <input type="hidden" name="id" value="<?php echo $struc['id'];?>">
              <input type="submit" name="delete" value=<?php echo _("Supprimer");?> /> </br>
              <input type="submit" name="generateCode" value=<?php echo _("Générer un code");?> /> </br>
              <input type="submit" name="inactive" value=<?php echo _("Marquer comme inactive");?> /> </br>

            </form>
          </td>
        </tr>

        <?php 
    }
    }
    else 
        { ?>
        <?php foreach ($structure as $struc) { ?>

        <tr>
          <td> <?php echo $struc['id'] ?></td>
          <td> <?php echo $struc['name'] ?></td>
          <td> <?php echo $struc['referent'] ?></td>
          <td> <?php echo $struc['address'] ?></td>
          <td> <?php echo $struc['city'] ?></td>
          <td> <?php echo $struc['postcode'] ?></td>
          <td> <?php echo $struc['country'] ?></td>
          <td> <?php echo $struc['phone_number'] ?></td>
          <td> <?php echo $struc['code'] ?></td>
          <td>
            <php><?php echo $struc['status']; ?></php>
          </td>
          <td>
            <form action="" id="searchUser" method="post">
              <input  type="hidden" name="id" value="<?php echo $struc['id'];?>">
              <input class="editButtons" type="submit" name="delete" value=<?php echo _("Supprimer");?> /> </br>
              <input class="editButtons" type="submit" name="generateCode" value=<?php echo _("Générer un code");?> /> </br>
              <input class="editButtons" type="submit" name="inactive" value=<?php echo _("Passer inactif");?> /> </br>

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
