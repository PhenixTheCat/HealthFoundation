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
    <div class="motDePasseOublie">
      <span class="enteteInscription">
        <a> Mot de passe oublié </a>
        <?php echo printError($error); ?>
      </span>


      <p>L'email a bien été envoyé. Veuillez vérifiez dans votre boite mail.</p>
      <a class="submitButtons" href="index.php">Retourner à l'accueil</a>

    </div>
  </div>

  <script src="script.js"></script>

</body>

</html>