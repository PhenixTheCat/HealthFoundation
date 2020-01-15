<?php
/* page qui affiche la page d'accueil de l'admin */
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



  <div class="centrer_bloc">
    <div class="headerContact">
      <h1><?php echo _(" Mon compte ");?></h1>




      <div class="adminCp">



        <form action="" method="post">
          <h3><?php echo _(" Informations détaillés ");?></h3>

          <h4><?php echo _(" Nom ");?></h4>
          <h5> <?php echo $coordonnees['last_name'];?></h5>
          <h4><?php echo _(" Prénom ");?></h4>
          <h5> <?php echo $coordonnees['first_name'];?></h5>
          <h4><?php echo _(" Date de naissance ");?></h4>
          <h5><?php echo $coordonnees['birthdate'];?></h5>
          <h4><?php echo _(" Adresse e-mail");?></h4>
          <h5><?php echo $coordonnees['email'];?></h5>
          <h4><?php echo _(" Mot de passe ");?></h4>



          <a class="lien" href="admin-modif-mdp.php"><?php echo _("Modifier le mot de passe ");?></a>
          <a class="lien" href="admin-modif-profil-perso.php"><?php echo _(" Modifier le profil");?></a>





        </form>

      </div>
    </div>
  </div>

  <script src="script.js"></script>

</body>

</html>
