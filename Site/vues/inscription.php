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
      <span id = "error">
    
        <?php echo printError($error); ?>
        <a class="enteteInscription" href="index.php?redirect=user&function=connexion"> Connexion </a>
        <a class="enteteInscription" href="index.php?redirect=user&function=inscription"> Inscription </a>
      </span>
      <fieldset>

        <form id = "form" action="" method="post">

          <label for="mail" id="email">E-mail</label>
          <input id = "email" type="email" name="mail" id="mail" pattern="^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">
          <br>
          <div id="message">
            <h3>Le mot de passe doit contenir au moins:</h3>
            <p id="letter" class="invalid">Une lettre minuscule</p>
            <p id="capital" class="invalid">Une lettre majuscule</p>
            <p id="number" class="invalid">Un nombre</b></p>
            <p id="length" class="invalid">8 caractères minimum</b></p>
          </div>
          <label for="mdp">Mot de passe</label>
          <input id ="password"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="doit contenir une lettre minuscule, une lettre majuscule,un chiffre et au moins 8 caractères" name="mdp">
          <br>
        

          <label for="mdp2">Confirmation du mot de passe</label>
          <input type="password" name="mdp2" id="mdp2">
          <br>
          <span id='passwordC' class='invalid'> Les mots de passe ne correspondent pas !</span>
          <br>
          <label for="codeFormateur">Code formateur</label>
          <input type="text" name="codeFormateur" id="codeFormateur"
            value="<?php if(isset($_POST['codeFormateur'])) { echo $_POST['codeFormateur']; } ?>">
          <br>
          <input class="submitButtons" type="submit" value="Suivant" id="submit" name="inscriptionP1">
        </form>
      </fieldset>

    </div>
  </div>


  <script src="vues/js/form.js"></script>
  <script src="script.js"></script>
</body>

</html>
