<!DOCTYPE html>
<html class="decorFond">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" media="screen" href="design.css" />
    <title>Healthfoundation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="pasImage">


    <div class="headerContact">
        <h1>Mon compte</h1>
    </div>

    <div class="moncompteblochaut">
        <div class="infoUtilisateur">
            <?php foreach ($data as $user) { ?>
            <h3> Informations détaillés </h3>
            <a class="lien" href="index.php?redirect=user&function=modificationProfil"> Modifier le profil</a>
            <h4> Nom </h4>
            <h5> <?php echo $user['last_name'];?></h5>
            <h4> Prénom </h4>
            <h5> <?php echo $user['first_name'];?></h5>
            <h4> Date de naissance </h4>
            <h5><?php echo $user['birthdate'];?></h5>
            <h4> Adresse email</h4>
            <h5><?php echo $user['email'];?></h5>
            <?php } ?>
            <h4> Mot de passe </h4>

            <a class="lien" href="index.php?redirect=user&function=modificationMotDePasse">Modifier le mot de passe </a>

        </div>
    </div>
    <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Pilot") : ?>
    <div class="resumeResultat">
        <h3> Résumé des resultats </h3>
        <h1><a href="index.php?redirect=test&function=resultatsGlobaux">Résultats </a></h1>
        <p>Cliquez sur l'onglet ci-dessus pour faire apparaitre les résultats de tout les tests effectués</p>
    </div>


    <div class="resultatsParCat">
        <h3> Resultats détaillés </h3>
        <div id="gestionDuStress">
            <h1><a href="index.php?redirect=test&function=resultatsGestionDuStress">Gestion du stress</a></h1>
            <p>
            Cliquez sur l'onglet ci-dessus pour faire apparaître les résultats du test de la gestion du stress
            </p>
        </div>
        <div id="reconnaissanceDeTonalite">
            <h1><a href="index.php?redirect=test&function=resultatsReconnaissanceDeTonalite">Reconnaissance de
                    tonalité</a></h1>
            <p>Cliquez sur l'onglet ci-dessus pour faire apparaître les résultats du test de la reconnaissance de tonalité</p>
        </div>

        <div id="tempsDeReaction">

            <h1><a href="index.php?redirect=test&function=resultatsTempsDeReaction">Temps de réaction</a></h1>
            <p>Cliquez sur l'onglet ci-dessus pour faire apparaître les résultats du test du temps de réaction</p>

        </div>

        <div id="seuilDePerception">
            <h1><a href="index.php?redirect=test&function=resultatSeuilsDePerception">Seuil de perception</a></h1>
            <p>Cliquez sur l'onglet ci-dessus pour faire apparaître les résultats du test du seuil de perceptions</p>

        </div>
    </div>
    <div id="resultatstestenligne">
        <h3> Resultats des test en ligne </h3>
        <div id="resultatenligne">
            <h1><a href="index.php?redirect=test&function=resultatsPsychotesteEnLigne">Résultats</a></h1>
            <p>Cliquez sur l'onglet ci-dessus pour faire apparaître les résultats du test en ligne</p>
        </div>
    </div>

    <?php endif;?>

    <?php echo printError($error); ?>
    <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?>

    <div class="resultatsParCat">
        </form>

        <h3> Compte à valider </h3>
        <?php  if(!empty($userToValidate)) { ?>
        <table border="1" class="validerCompte">
            <thead>
                <tr>
                    <th>Sexe</th>
                    <th>Nom </th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Type</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userToValidate as $user) { ?>
                <tr>
                <td  data-label="Sex">
                        <php><?php echo $user['sex']; ?></php>
                    </td>

                    <td  data-label="Nom">
                        <php><?php echo $user['last_name']; ?></php>
                    </td>
                    <td data-label="Prénom">
                        <php><?php echo $user['first_name']; ?></php>
                    </td>
                    <td data-label="Date de naissance">
                        <php><?php echo $user['birthdate']; ?></php>
                    </td>
                    <td data-label="Type">
                        <php><?php echo $user['type']; ?></php>
                    </td>
                    <form></form>
                    <td data-label="Statut">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <input class="gestionButtons" type="submit" name="activate" value="Activer">
                            <input class="gestionButtons" type="submit" name="delete" value="Supprimer">
                        </form>

                    </td>

                </tr>

                <?php } ?>
                <?php } ?>
            </tbody>
        </table>

        <?php  if(empty($userToValidate)) { ?>
        <h3>Aucun utilisateur à valider</h3>
        <?php  } ?>
    </div>

    <div class="resultatsParCat">
        <h3>Générer un code unique </h3>
        <?php foreach ($data as $user) { ?>
        <h5> <?php echo $user['code'];?></h5>
        <?php } ?>

        <form action="" method="post">
            <input class="submitButtons" type="submit" value="Générer" name="changeCodeInstructor">
        </form>
    </div>


    <?php endif;?>
    <script src="script.js"></script>

</body>

</html>
