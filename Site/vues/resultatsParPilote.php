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
    <h1 > Résultat de <?php echo $user['last_name']." ".$user['first_name'] ?>
    </h1>
    </div>


    <div class="resumeResultat">
        <h3> Résumé des resultats </h3>
        <h1><a href="index.php?redirect=test&function=resultatsGlobaux">Résultats </a></h1>
        <p>Description</p>
    </div>


    <div class="resultatsParCat">
        <h3> Resultats détaillés </h3>
        <div id="gestionDuStress" >
            <h1><a href="index.php?redirect=test&function=resultatsGestionDuStress">Gestion du stress</a></h1>
            <p>Cliquez sur cet onglet pour faire apparaître les resultats du test de la gestion du stress</p>
        </div>

        <div id="reconnaissanceDeTonalite">
            <h1><a href="index.php?redirect=test&function=resultatsReconnaissanceDeTonalite">Reconnaissance de
                    tonalité</a></h1>
            <p>Description</p>
        </div>

        <div id="tempsDeReaction" >

            <h1><a href="index.php?redirect=test&function=resultatsTempsDeReaction">Temps de réaction</a></h1>
            <p>Description</p>

        </div>

        <div id="seuilDePerception" >
            <h1><a href="index.php?redirect=test&function=resultatSeuilsDePerception">Seuil de perception</a></h1>
            <p>Description</p>

        </div>

        </div>
    <div id="resultatstestenligne" >
        <h3> Resultats test en ligne </h3>
        <div id="resultatenligne">
            <h1><a href="index.php?redirect=test&function=resultats">Résultats</a></h1>
            <p>Description</p>
        </div>
    </div>


    <script src="script.js"></script>

</body>

</html>