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
    <div class="headerContact">
      <h1> Mon compte </h1>




      <div class="piloteModifMdpp">

        <fieldset>
          <form action="" method="post">
            <?php echo printError($error); ?>
            <h3> Informations détaillés </h3>
            <label for="nom" id="nom">Nom </label>
            <input type="text" name="nom" id="nom" value="<?php echo $user['last_name']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifnom">
            <br>
            <label for="prenom" id="prenom">Prénom </label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $user['first_name']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifprenom">
            <br>
            <label for="date" id="date"> Date de naissance </label>
            <input type="date" name="date" id="date">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifdate">
            <br>

            <label for="mail" id="email">Adresse email</label>
            <input type="email" name="mail" id="mail" value="<?php echo $user['email']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifmail">

            <br>
            <label for="adressePostale" id="adressePostale">Adresse postale</label>
            <input type="text" name="adressePostale" id="adressePostale" value="<?php echo $user['adress']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifadresse">
            <br>
            <label for="codePostal" id="codePostal">Code postal</label>
            <input type="string" name="codePostale" id="codePostale" value="<?php echo $user['postecode']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifcodepostal">
            <br>
            <label for="ville" id="ville">Pays </label>
            <input type="text" name="ville" id="ville" value="<?php echo $user['city']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifpays">
            <br>
            <label for="pays" id="pays">Pays </label>
            <input type="text" name="pays" id="pays" value="<?php echo $user['country']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifville">
            <br>
            <label for="numeroDeTelephone" id="numeroDeTelephone">Numéro de téléphone</label>
            <input type="string" name="numeroDeTelephone" id="numeroDeTelephone"
              value="<?php echo $user['phone_number']; ?>">
            <input class="editButtons" type="submit" Value="Enregistrer" name="modifnumero">
            <br>

            <a href="index.php?redirect=user&function=monCompte" class="submitButtons">Retourner à la page Mon
              compte</a>

          </form>
        </fieldset>
      </div>
    </div>
  </div>

  <script src="script.js"></script>

</body>

</html>