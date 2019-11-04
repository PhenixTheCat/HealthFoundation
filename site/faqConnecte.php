

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
        <img src="Images/HF4.png" class="logo" alt="Logo de Health Foundation">
        <h1 id="Titre"><a href="index.php">Health Foundation</a></h1>
    </div>
    <div class="partieDroite">
        <nav id="menu">
            <ul>
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="apropos.php">À propos </a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>

            </ul>
        </nav>
        <div class=" logoLangue">
            <a href="index.php"><img src="Images/logoAnglais.jpg" class="logo" alt="Drapeau Anglais"></a>
            <a href="index.php"><img src="Images/logoFrance.jpg" class="logo" alt="Drapeau francais"></a>
        </div>
    </div>

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
            <h4>Réponse 2</h4>
        </div>
    </div>
        <div class="question">
        <button class="questionVisible">  Question 3 <i>+</i> </button>
        <div class="ReponseQuestion">
            <h4>Réponse 3</h4>
        </div>
    </div>
    <div class="question">
        <button class="questionVisible">  Question 4 <i>+</i> </button>
        <div class="ReponseQuestion">
            <h4>Réponse 4</h4>
    </div>
    <div class="">

        <button class="questionVisible">  Question 2 <i>+</i> </button>
        <div class="ReponseQuestion">
            <h4>Réponse 2</h4>
        </div>
    </div>
        <div class="question">
        <button class="questionVisible">  Question 3 <i>+</i> </button>
        <div class="ReponseQuestion">
            <h4>Réponse 3</h4>
        </div>
    </div>
    <div class="question">
        <button class="questionVisible">  Question 4 <i>+</i> </button>
        <div class="ReponseQuestion">
            <h4>Réponse 4</h4>
    </div>


    </div>

    <?php
    try{
        //connexion à la database
      $bdd = new PDO('mysql:host=localhost;dbname=health_foundation','root','root');
    }
    catch(Exception $error)
    {
        die('Erreur lors du chargement de la base de donnée : '.$error->getMessage());
    } 
    if(isset($_POST["envoifaq"]))
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

                echo "Question envoyée<br />"; 
                     } 
                    
                    
        else{
            echo "Adresse mail non valide";
          }
        }
        else
        {
            echo "Tous les champs doivent être remplis";
        }
    

    function securisation($donnees){
        $donnees = trim($donnees);
        $donnees = stripcslashes($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }


    ?>

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
        <textarea name="message" rows="10%" cols= "55%" placeholder="Votre message">
        
        </textarea>
        <input type="submit" Value="Envoyer" id="envoi"name="envoifaq">
          </form>
      </div> 

</div>

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
