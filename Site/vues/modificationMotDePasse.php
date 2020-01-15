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

<body class="allPage">

  <div class="centrer_bloc">
    <div class="headerContact">
      <h1><?php echo _(" Mon compte ");?></h1>


      <div class="piloteModiMdp">
        <?php echo printError($error); ?>
        <fieldset>
          <form action="" method="post">
            <h4><?php echo _(" Modification du mot de passe ");?></h4>
            <label for="Amdp" id="Amdp"><?php echo _("Ancien mot de passe ");?></label>
            <input type="password" name="Amdp" id="Amdp">
            <br>
            <label for="Nmdp" id="Nmdp"><?php echo _("Nouveau mot de passe ");?></label>
            <input type="password" name="Nmdp" id="Nmdp">
            <br>
            <label for="Cmdp" id="Cmdp"><?php echo _("Confirmer votre mot de passe ");?></label>
            <input type="password" name="Cmdp" id="Cmdp">
            <br>

            <input class="submitButtons" type="submit" Value=<?php echo _("Enregistrer");?> name="piloteModifMdp">
          </form>
        </fieldset>
      </div>
    </div>
  </div>



  <script src="script.js"></script>

</body>

</html>