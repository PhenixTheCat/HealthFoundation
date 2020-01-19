<?php
?>


<!DOCTYPE html>
<html>

<head>
    <title>APP</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

    <div class="headerFAQ">
        <h1> FAQ </h1>
    </div>

    <div class="faq">
    <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?>
        <h2> Ajouter une question</h2>
        <form method="POST"> 
            
        <label for="question">Question</label>

            <input type="text" name="question">

            <label for="answer">Réponse</label>

            <textarea name="answer" rows="10%" cols="50%" >
            </textarea>
            </br>

           <input class="submitButtons" type="submit" value="Ajouter" name="addQuestion">
           <div class="resultatsParCat">
        <h3> Répondre aux questions de la FAQ </h3>

        <a href="index.php?redirect=faq&function=faqReponse">Cliquer ici pour répondre aux questions de la FAQ</a>
        

    </div>
           <?php endif;?>
        </form>
        
        <h2> Les questions souvent posées</h2>
        <?php foreach ($questions as $ans) { ?>
        <div class="question">
            <button class="questionVisible"> <?php echo $ans['question']; ?></button>
            <div class="ReponseQuestion">
                <h4><?php echo $ans['answer']; ?> </h4>
            </div>
        </div>
        <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?>

    <form action="" method="POST" >
        <input type="hidden" name="id" value="<?php  echo $ans['id'];?>">
    <input class="editButtons" type="submit" name="deleteFaq" value="Supprimer">
    </form>
    <?php endif;?>
        <?php } ?>
        <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] != "Pilot") : ?>

        
    <?php endif;?>
        <!--
        <div class="question">
            <button class="questionVisible"> Qu'est-ce que le Pilotest en ligne ? <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Il s'agit d'une série de tests sous forme de QCM permettant d'évaluer le candidat sur son acuité visuelle et son raisonnement logique. </h4>
            </div>
        </div>

        <div class="question">
            <button class="questionVisible"> Comment accéder à mes résultats ?<i></i> </button>
            <div class="ReponseQuestion">
                <h4>Il faut se connecter puis vous aurez accès à votre page personnelle avec une rubrique comportant vos résultats.  </h4>
            </div>
        </div>

        <div class="question">
            <button class="questionVisible"> Comment puis-je contacter votre entreprise ? <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Il suffit de se rendre sur la fiche "Contact" en pied de page, puis de la remplir. </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Comment puis-je obtenir plus d'informations sur votre entreprise et votre produit ? <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Toutes nos informations complémentaires sur notre fonctionnement et notre produit sont disponibles dans la page "À propos" située en tête de page. </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Comment puis-je obtenir mon code formateur afin de finaliser mon inscription ? <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Pour obtenir votre code formateur et disposer d'un compte sur notre site internet, veuillez directement contacter votre formateur. </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Puis-je repasser le Pilotest en ligne en cas d'échec ? <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Suite à la création de votre compte sur notre site internet, vous aurez accès au Pilotest en ligne et ne pourrez le passer qu'une seule fois. Vos résultats à l'issue de votre première tentative seront donc définitifs ! </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Question 8 <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Question 9 <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>

        <div class="question">
            <button class="questionVisible"> Question 10 <i></i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>

        -->

        <div class="formulaireContact">
            <h2>Votre question n'est pas présente?</h2>
            <form action="" method="post">
                <label for="Nom" id="nom">Nom</label>
                <input type="text" name="nom">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom">
                <label for="mail">Adresse e-mail</label>
                <input type="email" name="mail">
                <label for="message">Votre message</label>
                <textarea name="message" rows="10" cols="55" placeholder="Votre message">

        </textarea>
                <input class="submitButtons" name="envoi" type="submit" Value="Envoyer" id="envoi">
            </form>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>
