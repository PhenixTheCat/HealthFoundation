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
        <a class="enteteNouveauMdp"><?php echo _(" Nouveau mot de passe ");?></a>

      </span>
      <?php echo printError($error); ?>
      <fieldset>
        <form action="" method="post">
        <div id="message">
            <h3><?php echo _("Le mot de passe doit contenir au moins:");?></h3>
            <p id="letter" class="invalid"><?php echo _("Une lettre minuscule");?></p>
            <p id="capital" class="invalid"><?php echo _("Une lettre majuscule");?></p>
            <p id="number" class="invalid"><?php echo _("Un nombre");?></b></p>
            <p id="length" class="invalid"><?php echo _("8 caractères minimum");?></b></p>
          </div>
          <label for="Nmdp" id="password"><?php echo _("Nouveau mot de passe ");?></label>
          <input id="password" type="password" name="Nmdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=<?php echo _("doit contenir une lettre minuscule, une lettre majuscule,un chiffre et au moins 8 caractères");?></inpu>>
          <br>
          <label for="Cmdp" ><?php echo _("Confirmer votre mot de passe ");?></label>
          <input  type="password" name="Cmdp" id="mdp2">
          <br>
          <span id='passwordC' class='invalid'><?php echo _(" Les mots de passe ne correspondent pas !");?></span>
          </br>
          <input class="submitButtons" type="submit" Value=<?php echo _("Valider");?> name="nouveauMdp">
        </form>
      </fieldset>
    </div>
  </div>

  <script src="vues/js/form.js"></script>
  <script src="script.js"></script>

</body>

</html>