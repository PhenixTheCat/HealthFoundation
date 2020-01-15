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
        <h1><?php echo _("Mon compte");?></h1>
    </div>

    <div class="moncompteblochaut">
        <div class="infoUtilisateur">
            <?php foreach ($data as $user) { ?>
            <h3><?php echo _(" Informations détaillés ");?></h3>
            <a class="lien" href="index.php?redirect=user&function=modificationProfil"><?php echo _(" Modifier le profil");?></a>
            <h4><?php echo _(" Nom ");?></h4>
            <h5> <?php echo $user['last_name'];?></h5>
            <h4><?php echo _(" Prénom ");?></h4>
            <h5> <?php echo $user['first_name'];?></h5>
            <h4><?php echo _(" Date de naissance ");?></h4>
            <h5><?php echo $user['birthdate'];?></h5>
            <h4><?php echo _(" Adresse email");?></h4>
            <h5><?php echo $user['email'];?></h5>
            <?php } ?>
            <h4><?php echo _(" Mot de passe ");?></h4>

            <a class="lien" href="index.php?redirect=user&function=modificationMotDePasse"><?php echo _("Modifier le mot de passe ");?></a>

        </div>
    </div>
    <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Pilot") : ?>
    <div class="resumeResultat">
        <h3><?php echo _(" Résumé des resultats ");?></h3>
        <h1><a href="index.php?redirect=test&function=resultatsGlobaux"><?php echo _("Résultats ");?></a></h1>
        <p><?php echo _("Description");?></p>
    </div>


    <div class="resultatsParCat">
        <h3><?php echo _(" Resultats détaillés ");?></h3>
        <div id="gestionDuStress">
            <h1><a href="index.php?redirect=test&function=resultatsGestionDuStress"><?php echo _("Gestion du stress");?></a></h1>
            <p><?php echo _("Description");?></p>
        </div>
        <div id="reconnaissanceDeTonalite">
            <h1><a href="index.php?redirect=test&function=resultatsReconnaissanceDeTonalite"><?php echo _("Reconnaissance de
                    tonalité");?></a></h1>
            <p><?php echo _("Description");?></p>
        </div>

        <div id="tempsDeReaction">

            <h1><a href="index.php?redirect=test&function=resultatsTempsDeReaction"><?php echo _("Temps de réaction");?></a></h1>
            <p><?php echo _("Description");?></p>

        </div>

        <div id="seuilDePerception">
            <h1><a href="index.php?redirect=test&function=resultatSeuilsDePerception"><?php echo _("Seuil de perception");?></a></h1>
            <p><?php echo _("Description");?></p>

        </div>
    </div>
    <div id="resultatstestenligne">
        <h3><?php echo _(" Resultats des test en ligne ");?></h3>
        <div id="resultatenligne">
            <h1><a href="index.php?redirect=test&function=resultats"><?php echo _("Résultats");?></a></h1>
            <p><?php echo _("Description");?></p>
        </div>
    </div>

    <?php endif;?>

    <?php echo printError($error); ?>
    <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?>

    <div class="resultatsParCat">
        </form>

        <h3><?php echo _(" Compte à valider ");?></h3>
        <?php  if(!empty($userToValidate)) { ?>
        <table border="1" class="validerCompte">
            <thead>
                <tr>
                    <th><?php echo _("Nom ");?></th>
                    <th><?php echo _("Prénom");?></th>
                    <th><?php echo _("Date de naissance");?></th>
                    <th><?php echo _("Type");?></th>
                    <th><?php echo _("Statut");?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userToValidate as $user) { ?>
                <tr>
                    <td>
                        <php><?php echo $user['last_name']; ?></php>
                    </td>
                    <td>
                        <php><?php echo $user['first_name']; ?></php>
                    </td>
                    <td>
                        <php><?php echo $user['birthdate']; ?></php>
                    </td>
                    <td>
                        <php><?php echo $user['type']; ?></php>
                    </td>
                    <form></form>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <input class="editButtons" type="submit" name="activate" value=<?php echo _("Activer");?>>
                            <input class="editButtons" type="submit" name="delete" value=<?php echo _("Supprimer");?></inpu>>
                        </form>

                    </td>

                </tr>

                <?php } ?>
                <?php } ?>
            </tbody>
        </table>

        <?php  if(empty($userToValidate)) { ?>
        <h3><?php echo _("Aucun utilisateur à valider");?></h3>
        <?php  } ?>
    </div>

    <div class="resultatsParCat">
        <h3><?php echo _("Générer un code unique ");?></h3>
        <?php foreach ($data as $user) { ?>
        <h5> <?php echo $user['code'];?></h5>
        <?php } ?>

        <form action="" method="post">
            <input class="submitButtons" type="submit" name="changeCodeInstructor">
        </form>
    </div>


    <?php endif;?>
    <script src="script.js"></script>

</body>

</html>
