<?php
/* Page ou l'on retrouve les différents résulats des tests en fontion des pilotes 
*/
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
<div class="headerContact">
    <h1 > <?php echo _("Résultats de")." ".$user['last_name']." ".$user['first_name'] ?>
    </h1>
    </div>


    <div class="resumeResultat">
        <h3> <?php echo _("Résumé des resultats");?> </h3>
        <h1><a href="index.php?redirect=test&function=resultatsGlobaux">Résultats </a></h1>
        <p><?php echo _("Description");?></p>
    </div>


    <div class="resultatsParCat">
        <h3> <?php echo _("Resultats détaillés");?> </h3>
        <div id="gestionDuStress" >
            <h1><a href="index.php?redirect=test&function=resultatsGestionDuStress"><?php echo _("Gestion du stress");?></a></h1>
            <p><?php echo _("Cliquez sur l'onglet ci-dessus pour faire apparaître les résultats du test de la gestion du stress");?></p>
        </div>

        <div id="reconnaissanceDeTonalite">
            <h1><a href="index.php?redirect=test&function=resultatsReconnaissanceDeTonalite"><?php echo _("Reconnaissance de
                    tonalité");?></a></h1>
            <p><?php echo _("Description");?></p>
        </div>

        <div id="tempsDeReaction" >

            <h1><a href="index.php?redirect=test&function=resultatsTempsDeReaction"><?php echo _("Temps de réaction");?></a></h1>
            <p><?php echo _("Description");?></p>

        </div>

        <div id="seuilDePerception" >
            <h1><a href="index.php?redirect=test&function=resultatSeuilsDePerception"><?php echo _("Seuil de perception");?></a></h1>
            <p><?php echo _("Description");?></p>

        </div>

        </div>
    <div id="resultatstestenligne" >
        <h3> <?php echo _("Resultats test en ligne");?> </h3>
        <div id="resultatenligne">
            <h1><a href="index.php?redirect=test&function=resultats"><?php echo _("Résultats");?></a></h1>
            <p><?php echo _("Description");?></p>
        </div>
    </div>


    <script src="script.js"></script>

</body>

</html>
