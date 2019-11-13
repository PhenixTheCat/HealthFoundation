
<?php

session_start();
include('osQuery.php');
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
//Test si l'utilisateur veut se déconnecter
if(isset($_GET['deconnexion']))
{
	$_SESSION['isConnected'] = false;
	header('Location:index.php');
	exit();
}
//Test d'arrivée sur le site du visiteur
if(!isset($_SESSION['isConnected']))
{
	$_SESSION['isConnected'] = false;
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
                <h1 ><a href="accueil.php" class="bigTitle">Health Foundation</a></h1>
            </div>
            <nav id="menu">
                <ul>
                    <li><a href="index.php"> Accueil</a></li>
                    <li><a href="apropos.php">À propos </a></li>
					<?php //Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?> 
					
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
					<?php endif;?>
					
					<?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']) : ?> 
                    <li><a href="pilote-mon-profil.php"><?php echo 'Mon compte' ?></a></li>
                    <li><a href="index.php?deconnexion=true">Se déconnecter</a></li>
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
                <div class="texteGauche">
                    <h2>"A LEGACY OF EXCELLENCE"</h2>
                    <form action="connexion.php"><button type="submit" class="boutonTest">Connectez-vous pour passer le pilotest test en ligne</button> 
                        <img src="Images/AppLogo.png" class="logoApp" alt="Logo solution APP">
                    </form>
                </div>  
                <img src="Images/fond1.png" class="photoAccueil" alt="Fond">
            </div>
    	</section>

    	<section class="section2">
            <h2>    Nos services    </h2>
            <div class="menuInformations">            
                <div class="partieMenu">
                    <img src="Images/coeur.png" class="logo" alt="Logo coeur">
                    <div>Réalisations de tests du rythme cardiaque grâce aux électrodes</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/poumon.png" class="logo" alt="Logo poumon">
                    <div>Réalisations de tests respiratoires grâce aux examens de Bronchoscopie</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/oreille.png" class="logo" alt="Logo oeil">
                    <div>Réalisations de tests d’acuité visuelle grâce à l’OCULUS Binoptometer 4P</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/oeil.png" class="logo" alt="Logo oreille">
                    <div>Réalisations de tests auditifs grâce aux examens d’otoscopie et d’audiométrie</div>
                </div>
            </div>
    	</section>

    	<section class="section3">
            <h2>                    Actualités                    </h2>
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

        <footer class="footerNonConnecte">
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
    
    </body>
</html>
