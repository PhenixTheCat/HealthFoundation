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
    <h1> Gestion des utilisateurs</h1>
  </div>

  <div class="formulaireContact">
    <?php echo printError($error); ?>
    <form action="" id="searchUser" method="post">
      <input id="search" name="searchUser" type="text" placeholder="Rechercher" />
      <input id="submitButtons" type="submit" name="rechercher" value="Rechercher" />
    </form>
    <table border="1">
      <thead>
        <tr>
          <th>Nom </th>
          <th>Prénom</th>
          <!-- <th>Sexe</th> -->
          <th>Date de naissance</th>
          <th> Type </th>
          <th>Structure</th>
          <th> Status </th>

          <th>Gestion</th>
        </tr>
      </thead>
      <tbody>
        <?php  if(isset($_POST['rechercher'])) { ?>
        <?php foreach ($users as $user) { ?>

        <tr>
          <td> <?php echo $user['last_name'] ?></td>
          <td> <?php echo $user['first_name'] ?></td>
          <!-- <td><php><?php //echo $user['sex']; ?></php></td> -->
          <td> <?php echo $user['birthdate'] ?></td>
          <td> <?php echo $user['type'] ?></td>
          <td> <?php echo $user['structure'] ?></td>
          <td> <?php echo $user['status'] ?></td>
          <td>
            <form action="" id="searchUser" method="post">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

              <input class="editButtons" type="submit" name="delete" value="Supprimer" /> </br>
              <input class="editButtons" type="submit" name="block" value="Bannir" /> </br>
              <input class="editButtons" type="submit" name="referent" value="Passer en référent" /> </br>
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
          <td> <?php echo $user['last_name'] ?></td>
          <td> <?php echo $user['first_name'] ?></td>
          <!-- <td><php><?php //echo $user['sex']; ?></php></td> -->
          <td> <?php echo $user['birthdate'] ?></td>
          <td> <?php echo $user['type'] ?></td>
          <td> <?php echo $user['structure'] ?></td>
          <td> <?php echo $user['status'] ?></td>
          <td>
            <form action="" id="searchUser" method="post">
              <input class="editButtons" type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <input class="editButtons" type="submit" name="delete" value="Supprimer" /> </br>
              <input class="editButtons" type="submit" name="block" value="Bannir" /> </br>

              <input class="editButtons" type="submit" name="referent" value="Passer en référent" /> </br>
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