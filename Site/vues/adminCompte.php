<?php
/* page qui affiche la page d'accueil de l'admin */
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body >

    
   
    <div class="centrer_bloc">
    <div class="headerContact">
    <h1 > Mon compte </h1>
     
  
  

    <div class="adminCp">  
           
          
           
            <form action=""  method="post"> 
            <h3> Informations détaillés </h3>

            <h4> Nom </h4>
            <h5> <?php echo $coordonnees['last_name'];?></h5>
            <h4> Prénom </h4>
            <h5> <?php echo $coordonnees['first_name'];?></h5>
            <h4> Date de naissance </h4>
            <h5><?php echo $coordonnees['birthdate'];?></h5>
            <h4> Adresse email</h4>
            <h5><?php echo $coordonnees['email'];?></h5>
            <h4> Mot de passe </h4>



            <a class = "lien" href="admin-modif-mdp.php">Modifier le mot de passe  </a>
            <a class= "lien" href="admin-modif-profil-perso.php"> Modifier le profil</a>
            


             

        </form>
       
      </div>
  </div>
  </div>
 
	  <script src="script.js"></script>

  </body>
</html>     
