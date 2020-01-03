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
              <input type="submit" name="activate" value="Valider l'inscription">
              <input type="submit" name="delete" value="Supprimer">
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
    <form action="" id="searchUser" method="post">
      <input id="search" name="searchUser" type="text" placeholder="Rechercher" />
      <input class="submitButtons" type="submit" name="rechercher" value="Rechercher" />
    </form>


    <a class="editButtons" href="index.php?redirect=structure&function=ajouterUneStructure">Ajouter une structure</a>



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
              <input type="submit" name="delete" value="Supprimer" /> </br>
              <input type="submit" name="generateCode" value="Générer un code" /> </br>
              <input type="submit" name="inactive" value="Marquer comme inactive" /> </br>

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
              <input class="editButtons" type="submit" name="delete" value="Supprimer" /> </br>
              <input class="editButtons" type="submit" name="generateCode" value="Générer un code" /> </br>
              <input class="editButtons" type="submit" name="inactive" value="Passer inactif" /> </br>

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
