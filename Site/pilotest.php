<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>

    <header class="headerNonConnecte" >
            <div class = logoPrincipal >
        <img src="HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
        </div>
            <nav id="menu">
                <ul>
                    <li><a href="index.php"> Accueil</a></li>
					<li><a href="aPropos.php">A propos </a></li>
				   <?php //Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?> 
					
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
					<?php endif;?>
					
					<?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']) : ?> 
                    <li><a href="monCompte.php"><?php echo 'Mon compte' ?></a></li>
                    <li><a href="index.php?deconnexion=true">Se déconnecter</a></li>
					<?php endif;?>

            </ul>

            </nav>
             <div class=" logoLangue">
                <a href="accueil.php"><img src="logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                <a href="accueil.php"><img src="logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
            </div>

    </header>


    <div class ="PilotestEnLigne">
      <span class="Pilotest en ligne">
        <h1>Pilotest en ligne</h1>
      </span>
    </div>

   <div class ="GestionDuStress">
    <span class = "Gestion du stress">
      <h1><a href="resultatsGestionDuStress.php">Gestion du stress</a></h1>
    </span>
    </div>

    <div class="ReconnaissanceDeTonalité">
      <span class="Reconnaissance de tonalité">
        <h1><a href="resultatsReconnaissanceDeTonalite.php">Reconnaissance de tonalité</a></h1>
      </span>
    </div>

    <div class="TempsDeRéaction">
      <span class="Temps de réaction">
        <h1><a href="resultatsTempsDeReaction.php">Temps de réaction</a></h1>
      </span>
    </div>

    <div class="SeuilDePerception">
      <span class="Seuil de perception">
        <h1><a href="resultatsSeuilsDeperception.php">Seuil de perception</a></h1>
      </span>
    </div>

    <div class="Résultats">
      <span class="Résultats">
        <h1><a href="resultats.php">Résultats</a></h1>
      </span>
    </div>



     <footer id="footer">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <?php //Si l'utilisateur n'est pas connecté
				if(!$_SESSION['isConnected']) : ?> 
				<div id="footerButton"><a href="inscription.php" >S'inscrire</a></div>
				<?php endif;?>
				
				<?php //Si l'utilisateur est connecté
				if($_SESSION['isConnected']) : ?> 
				<div id="footerButton"><a href="index.php?deconnexion=true.php" >Déconnexion</a></div>
				<?php endif;?>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
      </footer>
	<script src="script.js"></script>

  </body>
</html>
