<?php


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
    <div class="inscriptionP1">
      <span>
        <?php echo printError($error); ?>
        <a class="enteteInscription" href="index.php?redirect=user&function=connexion"> Connexion </a>
        <a class="enteteInscription" href="index.php?redirect=user&function=inscription"> Inscription </a>
      </span>
      <fieldset>
        <div id = "error"></div>
        <form id = "form" action="" method="post">

          <label for="mail" id="email">Email</label>
          <input id = "email" type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
          <br>
          <label for="mdp">Mot de passe</label>
          <input id ="password"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="doit contenir une lettre minuscule, une lettre majuscule,un chiffre et doit être supérieur à 8 " name="mdp">
          <br>
         
          <label for="mdp2">Confirmation du mot de passe</label>
          <input  type="password" name="mdp2" id="mdp2">
          <br>
          <label for="codeFormateur">Code formateur</label>
          <input type="text" name="codeFormateur" id="codeFormateur"
            value="<?php if(isset($_POST['codeFormateur'])) { echo $_POST['codeFormateur']; } ?>">
          <br>
          <input class="submitButtons" type="submit" Value="Suivant" name="inscriptionP1">
        </form>
      </fieldset>

    </div>
  </div>
  <script src="script.js"></script>

</body>

</html>