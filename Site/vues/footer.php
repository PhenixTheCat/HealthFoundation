<!DOCTYPE html>
<html>
<div class="fondGris"></div>
    <div class="specialTest"></div>
<footer id="footer">
	<link rel="stylesheet" media="screen" href="design.css" />

	<div class="menuBas">
		<a href="index.php?redirect=user&function=cgu" target="_blank"> CGU</a>
		<a href="index.php?redirect=faq&function=faq"> FAQ/Aide</a>
		<a href="index.php?redirect=contact&function=contact"> Contact</a>
		<?php //Si l'utilisateur n'est pas connecté
				if(!$_SESSION['isConnected']) : ?>
		<div id="footerButton"><a href="index.php?redirect=user&function=inscription">Inscription</a></div>
		<?php endif;?>

		<?php //Si l'utilisateur est connecté
				if($_SESSION['isConnected']) : ?>
		<div id="footerButton"><a href="index.php?deconnexion=true.php">Déconnexion</a></div>
		<?php endif;?> <p>©Copyright Health Foundation, tous droits réservés</p>



	</div>
</footer>

</html>
