
<?php
session_start();
include('osQuery.php');
$_SESSION['admin'] = false;
$_SESSION['isConnected'] = true;
try{
	//connexion à la database
	//Pour les utilisateurs Mac : entrez cette ligne
	//$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
    //Pour windows entrez cette ligne
    
	if (getOS( $_SERVER['HTTP_USER_AGENT'])=='Windows' || getOS( $_SERVER['HTTP_USER_AGENT'])=='Linux')
	{
        $bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');
        $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	elseif (getOS( $_SERVER['HTTP_USER_AGENT'])=='Mac')
	{
        $bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
        $bdd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
}
catch(Exception $error)
{
	die('Erreur lors du chargement de la base de donnée : '.$error->getMessage().' Vérifiez dans le code source les instructions');
}
//Test d'arrivée sur le site du visiteur
if(!isset($_SESSION['isConnected']))
{
	$_SESSION['isConnected'] = false;
}
if(isset($_POST['Connexion'])) {
	
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = htmlspecialchars($_POST['mdp']);
	$mdp = sha1($mdp);
	//On vérifie si le mail et le mdp correspondent
	$requete = $bdd->query('SELECT id FROM user WHERE email=\''.$mail.'\' AND password =\''.$mdp.'\'');
	if($donnee = $requete->fetch())
	{
		$requeteCompteValide = $bdd->query('SELECT id FROM user WHERE email=\''.$mail.'\' AND password =\''.$mdp.'\' AND status = "A"');
		if($donneeCompteValide = $requeteCompteValide->fetch())
		{
			$_SESSION['isConnected'] = true;
			$_SESSION['userID'] = $donnee['id'];
            if($donnee['type']=="Administrator"){
                $_SESSION['admin'] = true;
                header('Location:index.php');}
            else if ($donnee['type']=="Instructor"){
                 $_SESSION['instructor'] = true;
                 $_SESSION['admin'] = false;
                 header('Location:index.php');
            }
            else{
                 $_SESSION['instructor'] = false;
                 $_SESSION['admin'] = false;
                 header('Location:index.php');
            }
		}
		else
		{
			$erreur = "Vous n'avez pas vérifié votre adresse mail, veuillez consulter vos mails";
		}
		
	}
	else
	{
		$erreur = "L'email et le mot de passe ne correspondent pas";
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" href="design.css" />
        <title>Healthfoundation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    	<header class="headerNonConnecte" >
            <div class = logoPrincipal >
                <img src="Images/HF4.png" class="logo" alt="Logo Health Foundation">
                <h1 ><a href="index.php" class="bigTitle">Health Foundation</a></h1>
            </div>
            <nav <?php  if(!$_SESSION['isConnected']) : ?> class="notConnectedNAV"<?php endif;?>
                 <?php  if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> class="connectedNAV"<?php endif;?> 
                 <?php  if($_SESSION['admin']) : ?> class="adminNAV"<?php endif;?>                                                              
                                                                                id="menu">
                <ul <?php  if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> class="connectedrightUL"<?php endif;?>
                    <?php  if($_SESSION['admin']) : ?> class="adminrightUL"<?php endif;?> >
                    <li><a href="index.php"> Accueil</a></li>
                                            <?php //Si l'utilisateur n'est pas un admin
					if(!$_SESSION['admin']) : ?>
                    <li><a href="aPropos.php">À propos </a></li>
                </ul>
                <ul <?php  if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> class="connectedLeftUL"<?php endif;?>>
					<?php endif;
                                            //Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?>
                
                
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
					<?php endif;?>
					
					<?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']&& !$_SESSION['admin']) : ?> 
                    <li><a href="monCompte.php">Mon compte</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
                    <?php endif;?>
                    
                    <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['admin']) : ?> 
                    
                    <li><a href="gestionUtilisateur.php">Gestion des utilisateurs</a></li>
                </ul>
                <ul <?php  if($_SESSION['admin']) : ?> class="adminLeftUL"<?php endif;?> >
                    <li><a href="gestionDesStructures.php">Gestion des structures</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
					<?php endif;?>
                </ul>
             
                <div class=" logoLangue">
                    <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                    <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
                </div>
            </nav>
            
    	</header>
        
        <div class="specialTest"></div>
    	<section class="section1">
            <div>
                
                <img src="Images/fond1.png" class="photoAccueil" alt="Fond">
                <div class="texteGauche">
                    <h2>"A LEGACY OF EXCELLENCE"</h2>
                    <form action="connexion.php"><button type="submit" class="boutonTest">Connectez-vous pour passer le pilotest test en ligne</button> 
                        <img src="Images/AppLogo.png" class="logoApp" alt="Logo solution APP">
                    </form>
                </div>  
                
            </div>
    	</section>

    	<section class="section2">
            <h2>Nos services</h2>
            <div class="menuInformations">    
                <div class="ligneMenu">
                    <div class="partieMenu">
                        <img src="Images/coeur.png" class="logo" alt="Logo coeur">
                        <div>Réalisations de tests du rythme cardiaque grâce aux électrodes</div>
                    </div>
                    <div class="partieMenu">
                        <img src="Images/poumon.png" class="logo" alt="Logo poumon">
                        <div>Réalisations de tests respiratoires grâce aux examens de Bronchoscopie</div>
                    </div>
                </div>
                <div class="ligneMenu">
                    <div class="partieMenu">
                        <img src="Images/oreille.png" class="logo" alt="Logo oeil">
                        <div>Réalisations de tests d’acuité visuelle grâce à l’OCULUS Binoptometer 4P</div>
                    </div>
                    <div class="partieMenu">
                        <img src="Images/oeil.png" class="logo" alt="Logo oreille">
                        <div>Réalisations de tests auditifs grâce aux examens d’otoscopie et d’audiométrie</div>
                    </div>
                </div>
            </div>
    	</section>

    	<section class="section3">
            <h2>Actualités</h2>
            <div class="sectionInformations">
                <div class="ligneInformation">
                    <div class="info1">
                        <h3>Notre environnement</h3>
                        <div>
                            Parcourez nos plus grands sites de productions ainsi que nos laboratoires de tests et simulations.
                        </div>
                    </div>
                    <div class="info2">
                        <h3>Nos collaborateurs</h3>
                        <div>
                            Des équipes de techniciens, ingénieurs, 
                            et médecins experts collaborent chaque jour pour répondre à vos besoins.
                        </div>
                    </div>
                </div>
                <div class="ligneInformation">
                    <div class="info1">
                        <h3>Nos investisseurs</h3>
                        <div>
                            Le ministère des Armées et L'ISEP se sont engagés à nos côtés.
                        </div>
                    </div>
                    <div class="info2">
                        <h3>Notre design</h3>
                        <div>
                            Chacun de nos produits est 
                            conçu dans un design unique 
                            et purement ergonomique.
                        </div>
                    </div>
                </div>
                <div class="ligneInformation">
                    <div class="info1">
                        <h3>Nos technologies de pointe</h3>
                        <div>
                            Découvrez nos technologies les 
                            plus performantes et récemment
                            mises au jour pour vous.
                        </div>
                    </div>
                    <div class="info2">
                        <h3>Nos produits à venir</h3>
                        <div>
                            Restez informés de nos futurs produits
                            lors de nos prochaines conférences 
                            et présentations .
                        </div>
                    </div>
                </div>
            </div>
    	</section>

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
