
<?php

session_start();
try{
	//connexion à la database
	//Pour les utilisateurs Mac : entrez cette ligne
	$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
	//Pour windows entrez cette ligne
	//$bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','');
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
                <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
            </div>
            <nav id="menu">
                <ul>
                    <li><a href="indexAdministrator.php"> Accueil</a></li>
                    <li><a href="gestionUtilisateur.php">Gestion des utilisateurs </a></li>
                    <li><a href="admin-compte-perso.php">Mon compte</a></li>
                    <li><a href="deconnexion.php">Se déconnecter</a></li>

                </ul>
             
            </nav>
            <div class=" logoLangue">
                <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
                <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
            </div>
    	</header>

    	<div class="blocIntroAccueil">
            <div class="colonne1Accueil">
                <h1>"A LEGACY OF EXCELLENCE"</h1>
            
                <div class="logoAPPAccueil">
                
                <img src="Images/AppLogo.png" class="logo" alt="Logo solution APP">
                </div>
              </div>
              
              
            </div>
            <div class="colonne2Accueil">
                <img src="Images/fond1.png" class="imageAccueil" alt="Fond">
            </div>
    	</div>

    	<section class="nosServicesAccueil">
            <h1>Nos services</h1>
              <div class="menuInformations">            
                <div class="partieMenu">
                    <img src="Images/logoFrance.png" class="logo" alt="Cardio">
                    <div>Réalisations de tests du rythme cardiaque grâce aux électrodes</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/logoFrance.png" class="logo" alt="Pulmo">
                    <div>Réalisations de tests respiratoires grâce aux examens de Bronchoscopie</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/logoFrance.png" class="logo" alt="Visio">
                    <div>Réalisations de tests d’acuité visuelle grâce à l’OCULUS Binoptometer 4P</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/logoFrance.png" class="logo" alt="Auditio">
                    <div>Réalisations de tests auditifs grâce aux examens d’otoscopie et d’audiométrie</div>
                </div>
            </div>
            <br>
    	</section>

    	<section class="actualitesAccueil">
            <h1>Actualités</h1>
            
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
                <div id="connexion"><a href="deconnexion.php" >Deconnexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>
    
    </body>
</html>
