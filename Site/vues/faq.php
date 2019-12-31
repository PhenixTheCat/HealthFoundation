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
        <h2> Les questions souvent posées</h2>
        <div class="question">
            <button class="questionVisible"> Question 1 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse 1</h4>
            </div>
        </div>

        <div class="question">
            <button class="questionVisible"> Question 2 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>

        <div class="question">
            <button class="questionVisible"> Question 3 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>

        <div class="question">
            <button class="questionVisible"> Question 4 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Question 5 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Question 6 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Question 7 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Question 8 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>


        <div class="question">
            <button class="questionVisible"> Question 9 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>

        <div class="question">
            <button class="questionVisible"> Question 10 <i>+</i> </button>
            <div class="ReponseQuestion">
                <h4>Réponse </h4>
            </div>
        </div>



        <div class="formulaireContact">
            <h2>Votre question n'est pas présente ?</h2>
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
                <input class="submitButtons" type="submit" Value="Envoyer" id="envoi">
            </form>
        </div>

    </div>


    <script src="script.js"></script>
</body>

</html>
