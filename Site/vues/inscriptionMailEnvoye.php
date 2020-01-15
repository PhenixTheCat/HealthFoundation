<!DOCTYPE html>
<html>

<head>
    <title>APP</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>


    <div class="centrer_bloc">
        <div class="confirmationInscription">
            <h2><?php echo _("Confirmation de création de compte ");?></h2>
            <p><?php echo _("Un mail a été envoyé à l’adresse".<?php $_SESSION['signupMail']?>.". Pour confirmer votre inscription,
                veuillez vérifier votre boîte de réception");?></p>
        </div>
    </div>


    <script src="script.js"></script>


</body>

</html>
