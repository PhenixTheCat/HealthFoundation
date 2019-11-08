<?php
session_start();
try{
	//connexion à la database
	//Pour les utilisateurs Mac : entrez cette ligne
	//$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
	//Pour windows entrez cette ligne
	$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');
}
catch(Exception $error)
{
	die('Erreur lors du chargement de la base de donnée : '.$error->getMessage().' Vérifiez dans le code source les instructions');
}
if($_SESSION['isConnected'])
{
	//On recherche les prenoms et noms si l'utilisateur est connecté
	$requetePrenom = $bdd->query('SELECT first_name FROM user WHERE id = \''.$_SESSION['userID'].'\'');
	if($donneePrenom = $requetePrenom->fetch())
	{
		$prenom = $donneePrenom['first_name'];
	}
	else
	{
		echo 'Erreur, utilisateur inexistant';
	}
	
	$requeteNom = $bdd->query('SELECT last_name FROM user WHERE id = \''.$_SESSION['userID'].'\'');
	if($donneeNom = $requeteNom->fetch())
	{
		$nom = $donneeNom['last_name'];
	}
	else
	{
		echo 'Erreur, utilisateur inexistant';
	}
}
?>
<!DOCTYPE html>
<html class="decorFond">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" href="design.css" />
        <title>Healthfoundation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="pasImage">
        
    	<header class="headerNonConnecte" >
            <div class = logoPrincipal >
                <img src="Images/HF4.png" class="logo" alt="Logo Health Foundation">
                <h1 ><a href="index.php" class="bigTitle">Health Foundation</a></h1>
            </div>
            <nav id="menu">
                <ul>
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
                    <li><a href="connexion.php"><?php echo $nom.' '.$prenom ?></a></li>
                    <li><a href="inscription.php">Se déconnecter</a></li>
					<?php endif;?>
                </ul>

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
                <div id="connexion"><a href="connexion.php" >Connexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>
    
    </body>
</html>
