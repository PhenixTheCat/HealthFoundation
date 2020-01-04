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
    <div class="nouveauMdp">
      <span>
        <a class="enteteNouveauMdp"> Nouveau mot de passe </a>

      </span>
      <?php echo printError($error); ?>
      <fieldset>
        <form action="" method="post">
        <div id="message">
            <h3>Le mot de passe doit contenir au moins:</h3>
            <p id="letter" class="invalid">Une lettre minuscule</p>
            <p id="capital" class="invalid">Une lettre majuscule</p>
            <p id="number" class="invalid">Un nombre</b></p>
            <p id="length" class="invalid">8 caractères minimum</b></p>
          </div>
          <label for="Nmdp" id="password">Nouveau mot de passe </label>
          <input id="password" type="password" name="Nmdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="doit contenir une lettre minuscule, une lettre majuscule,un chiffre et au moins 8 caractères">
          <br>
          <label for="Cmdp" >Confirmer votre mot de passe </label>
          <input  type="password" name="Cmdp" id="mdp2">
          <br>
          <span id='passwordC' class='invalid'> Les mots de passe ne correspondent pas !</span>
          </br>
          <input class="submitButtons" type="submit" Value="Valider" name="nouveauMdp">
        </form>
      </fieldset>
    </div>
  </div>

  <script src="js/form.js"></script>
  <script src="script.js"></script>

</body>

</html>