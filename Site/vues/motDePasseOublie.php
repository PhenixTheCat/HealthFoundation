<!DOCTYPE html>
<html>
<div class="centrer_bloc">
  <div class="motDePasseOublie">
    <span class="enteteInscription">
      <a><?php echo _(" Mot de passe oublié ");?></a>
      <?php echo printError($error); ?>
    </span>

    <fieldset>
      <form action="" method="post">
        <p><?php echo _("Veuillez indiquer l'adresse e-mail associée à votre compte ");?></p>

        <label for="mail" id="email">Email</label>
        <input type="email" name="mail" id="mail">
        <br>
        <input class="submitButtons" type="submit" Value="Valider" name="motDePasseOublie">
      </form>
    </fieldset>
  </div>
</div>
<script src="script.js"></script>

</body>

</html>