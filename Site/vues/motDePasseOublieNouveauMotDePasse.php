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

          <label for="Nmdp" id="Nmdp">Nouveau mot de passe </label>
          <input type="password" name="Nmdp" id="Nmdp">
          <br>
          <label for="Cmdp" id="Cmdp">Confirmer votre mot de passe </label>
          <input type="password" name="Cmdp" id="Cmdp">
          <br>
          <input class="submitButtons" type="submit" Value="Valider" name="nouveauMdp">
        </form>
      </fieldset>
    </div>
  </div>


  <script src="script.js"></script>

</body>

</html>