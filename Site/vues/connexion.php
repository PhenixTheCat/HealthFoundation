<?php
/* Page de connexion au site web */
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>

   
    <div class="centrer_bloc">
     <div class="Connexion">
     <?php echo printError($error); ?>

        <span>
      
          <a class="enteteInscription" href="index.php?redirect=user&function=connexion"> Connexion </a>
          <a class="enteteInscription" href="index.php?redirect=user&function=inscription"> Inscription </a>
        </span>
         
          <fieldset>
          <form action="" method="post"> 
          
          <label id="email">Email</label>
          <input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" >
          <br>
          <label >Mot de passe</label>
          <input type="password" name="mdp" id="mdp">
          <br>
          <input class="submitButtons" type="submit" Value="Suivant" name="Connexion">
        </form>
        </fieldset>
        <a id= mdp href="index.php?redirect=user&function=motDePasseOublie">Mot de passe oublié</a>
      </div>
    </div>

	  <script src="script.js"></script>

  </body>
</html>
