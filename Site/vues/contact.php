<?php
/* Page qui permet aux utilisateurs de contacter l'administrateur */

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





  <div class="headerContact">
    <h1> Contact </h1>
  </div>
  <div class"center_bloc">
    <div class="formulaireContact">
      <?php echo printError($error); ?>
      <form action="" method="post">
        <label for="Nom" id="nom">Nom</label>
        <input type="text" name="nom" 
          value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" 
          value="<?php if(isset($_POST['prenom'])) { echo $_POST['prenom']; } ?>" /><br /><br />
        <label for="mail">Adresse email</label>
        <input type="email" name="mail"
          value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
        <label for="objet">Objet</label>
        <input type="text" name="objet"
          value="<?php if(isset($_POST['objet'])) { echo $_POST['objet']; } ?>" /><br /><br />
        <label for="message">Votre message</label>
        <textarea name="message" rows="10" cols="55" >
        <?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>
    </textarea>
        <input class="submitButtons" type="submit" Value="Envoyer" id="envoi">
      </form>
    </div>
  </div>


  <script src="script.js"></script>
</body>

</html>
