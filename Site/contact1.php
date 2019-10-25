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
    <?php
    if(isset($_POST) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['mail']) AND isset($_POST['objet']) AND!empty($_POST['message'])){
        if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail'])
            AND !empty($_POST['objet']) AND!empty($_POST['message'])){
            $nom = securisation($_POST['nom']);
            $prenom = securisation($_POST['prenom']);
            $mail = securisation($_POST['mail']);
            $objet = securisation($_POST['objet']);
            $message = str_replace("\n.", "\n..", $_POST['message']);
            $msg='
            <html>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <body>
                       <div align="center">
                          <img src="Images/HF4.png"/>
                          <br />
                            <h1> Un mail à été reçu !</h1>
                          <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
                          <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
                          <br />
                          '.nl2br($_POST['message']).'
                          <br />
                       </div>
                    </body>
                 </html>
                 ';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From : ".$nom." <".$mail.">"."\r\n";
            
            
            mail('health.foundation.g3c@free.fr',$objet,$msg,$headers);
            header('Location:contactMessageEnvoye.php');
        }
        else
        {
            echo "Tous les champs doivent être remplis";
        }
    }
    function securisation($donnees){
        $donnees = trim($donnees);
        $donnees = stripcslashes($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }
    ?>


    <div class="headerContact">
    <h1 > Contact </h1>
  </div>
    
    <div class="formulaireContact">  
      
    <form action="" method="post" >
    <label for="Nom" id="nom">Nom</label>
    <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom"  placeholder="Votre prénom" value="<?php if(isset($_POST['prenom'])) { echo $_POST['prenom']; } ?>" /><br /><br />
    <label for="mail">Adresse e-mail</label>
    <input type="email" name="mail"  placeholder="Votre mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
    <label for="objet">Objet</label>
    <input type="text" name="objet"  placeholder="L'objet du mail" value="<?php if(isset($_POST['objet'])) { echo $_POST['objet']; } ?>" /><br /><br />
    <label for="message">Votre message</label>
    <textarea name="message" rows="10" cols= "55"  placeholder="Votre message" >
        <?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>
    </textarea>
    <input type="submit" Value="Envoyer" id="envoi">
      </form>
  </div> 

  <footer class="footerNonConnecte">
            <div class="menuBas">
                <a href="cgu.php" target="_blank"> CGU</a>
                <a href="faq.php"> FAQ/Aide</a>
                <a href="contact.php"> Contact</a>
                <div id="deconnexion"><a href="index.php" >Déconnexion</a></div>
                <p>©Copyright Health Foundation, tout droits réservés</p>
            </div>
        </footer>
  </body>
</html>
