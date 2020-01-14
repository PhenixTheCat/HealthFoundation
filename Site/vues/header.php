<!DOCTYPE html>
<html>
<header class="headerNonConnecte">
    <div class=logoPrincipal>
        <img src="Images/AppLogo.png" class="logo" alt="Logo Health Foundation">
        <h1><a href="index.php" class="bigTitle">Analyseur Psychotechnique pour Pilotes</a></h1>
        <!---<h2><a href="index.php" class="littleTitle">Application Psychotechnique pour Pilotes</a></h2>--->
    </div>
    <nav <?php  if(!$_SESSION['isConnected']) : ?> class="notConnectedNAV" <?php endif;?>
        <?php  if($_SESSION['userType'] == "Instructor") : ?> class="instructorNAV" <?php endif;?>
        <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> class="connectedNAV"
        <?php endif;?> <?php  if($_SESSION['userType'] == "Administrator") : ?> class="adminNAV" <?php endif;?>
        id="menu">
        <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?> class="instructorrightUL"
            <?php endif;?> <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?>
            class="connectedrightUL" <?php endif;?> <?php  if($_SESSION['userType']=="Administrator") : ?>
            class="adminrightUL" <?php endif;?>>
            <li><a href="index.php?redirect=user"> Accueil</a></li>
            <?php //Si l'utilisateur n'est pas un admin
					if($_SESSION['userType'] == "Pilot" || $_SESSION['userType'] == "user") : ?>
            <li><a href="index.php?redirect=user&function=aPropos">À propos </a></li>
        </ul>
        <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?> class="instructorLeftUL"
            <?php endif;?> <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?>
            class="connectedLeftUL" <?php endif;?>>
            <?php endif;
                    if($_SESSION['userType'] == "Instructor") : ?>
            <li><a href="index.php?redirect=user&function=resultatsPilote">Resultats Pilotes</a></li>
        </ul>
        <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?> class="instructorLeftUL"
            <?php endif;?>>
            <?php endif;
                    
					//Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?>
            <li><a href="index.php?redirect=user&function=connexion">Connexion</a></li>
            <li><a href="index.php?redirect=user&function=inscription">Inscription</a></li>
            <?php endif;?>

            <?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?>
            <li><a href="index.php?redirect=user&function=monCompte">Mon compte</a></li>
            <li><a href="index.php?deconnexion=true.php">Déconnexion</a></li>
            <?php endif;?>

            <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?>

            <li><a href="index.php?redirect=user&function=gestionDesUtilisateurs">Gestion des utilisateurs</a></li>
        </ul>
        <ul <?php  if($_SESSION['userType'] == "Administrator") : ?> class="adminLeftUL" <?php endif;?>>
            <li><a href="index.php?redirect=structure&function=gestionDesStructures">Gestion des structures</a></li>
            <li><a href="index.php?deconnexion=true.php">Déconnexion</a></li>
            <?php endif;?>
        </ul>


        <div class=" logoLangue">
            <a href="index.php?lang=en"><img src="Images/logoAnglais.jpg" class="logo" alt="Passer site en anglais"></a>
            <a href="index.php?lang=fr"><img src="Images/logoFrance.jpg" class="logo" alt="Passer site en francais"></a>
        </div>
    </nav>

</header>

</html>
