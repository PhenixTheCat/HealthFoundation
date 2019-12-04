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

//Test d'arrivée sur le site du visiteur
if(!isset($_SESSION['isConnected']))
{
	$_SESSION['isConnected'] = false;
}


if(isset($_POST["envoi"]))
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND!empty($_POST['message'])){
        $nom = securisation($_POST['nom']);
        $prenom = securisation($_POST['prenom']);
        $mail = securisation($_POST['mail']);
        $msg = str_replace("\n.", "\n..", $_POST['message']);    
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $reqfaq = $bdd->prepare('INSERT INTO faq (first_name, last_name, email, question) VALUES (:nom,:prenom,:mail,:msg)');
            $reqfaq->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $mail,
                'msg' => $msg
            ));
            $erreur = "Question envoyée<br />"; 
                 } 
                
                
    else{
        $erreur = "Adresse mail non valide";
      }
    }
    else
    {
        $erreur ="Tous les champs doivent être remplis";
    }

function securisation($donnees){
    $donnees = trim($donnees);
    $donnees = stripcslashes($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
}
?>

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
                <img src="Images/HF4.png" class="logo" alt="Logo Health Foundation">
                <h1 ><a href="index.php" class="bigTitle">Health Foundation</a></h1>
            </div>
            <nav <?php  if(!$_SESSION['isConnected']) : ?> class="notConnectedNAV"<?php endif;?>
                 <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> class="connectedNAV"<?php endif;?> 
                 <?php  if($_SESSION['userType'] == "Administrator") : ?> class="adminNAV"<?php endif;?>                                                              
                                                                                id="menu">
                <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> class="connectedrightUL"<?php endif;?>
                    <?php  if($_SESSION['userType']=="Administrator") : ?> class="adminrightUL"<?php endif;?> >
                    <li><a href="index.php"> Accueil</a></li>
                                            <?php //Si l'utilisateur n'est pas un admin
					if($_SESSION['userType'] == "Pilot" || $_SESSION['userType'] == "user") : ?>
                    <li><a href="aPropos.php">À propos </a></li>
                </ul>
                <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?> class="connectedLeftUL"<?php endif;?>>
					<?php endif;
                    if($_SESSION['userType'] == "Instructor") : ?>
                    <li><a href="index.php">Resultats Pilotes</a></li>
                </ul>
                <ul <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> class="connectedLeftUL"<?php endif;?>>
					<?php endif;
                    
					//Si l'utilisateur n'est pas connecté
					if(!$_SESSION['isConnected']) : ?>
                
                
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
					<?php endif;?>
					
					<?php //Si l'utilisateur est connecté
					if($_SESSION['isConnected']&& $_SESSION['userType'] != "Administrator") : ?> 
                    <li><a href="monCompte.php">Mon compte</a></li>
                    <li><a href="index.php?deconnexion=true.php">Se déconnecter</a></li>
                    <?php endif;?>
                    
                    <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?> 
                    
                    <li><a href="gestionDesUtilisateurs.php">Gestion des utilisateurs</a></li>
                </ul>
                <ul <?php  if($_SESSION['userType'] == "Administrator") : ?> class="adminLeftUL"<?php endif;?> >
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

<div class="headerFAQ">
    <h1 > FAQ </h1>
</div>

<div class="faq">
    <h2> Les questions souvent posées</h2>
    <div class="question">
        <button class="questionVisible">  Question 1 <i>+</i> </button>
        <div class="ReponseQuestion">
            <h4>Réponse 1</h4>
        </div>
    </div>

    <div class="question">
        <button class="questionVisible">  Question 2 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>

    <div class="question">
        <button class="questionVisible">  Question 3 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>

    <div class="question">
        <button class="questionVisible">  Question 4 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>


    <div class="question">
        <button class="questionVisible">  Question 5 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>


    <div class="question">
        <button class="questionVisible">  Question 6 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>


    <div class="question">
        <button class="questionVisible">  Question 7 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>


    <div class="question">
        <button class="questionVisible">  Question 8 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>


    <div class="question">
        <button class="questionVisible">  Question 9 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>

    <div class="question">
        <button class="questionVisible">  Question 10 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
    </div>



    <div class="formulaireFAQ">  
        <h2>Votre question n'est pas présente ?</h2>
        <form action="" method="post"> 
        <label for="Nom" id="nom">Nom</label>
        <input type="text" name="nom">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom">
        <label for="mail">Adresse e-mail</label>
        <input type="email" name="mail">
        <label for="message">Votre message</label>
        <textarea name="message" rows="10" cols= "55" placeholder="Votre message">
        
        </textarea>
        <input class="submitButtons" type="submit" Value="Envoyer" id="envoi">
          </form>
      </div> 

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
