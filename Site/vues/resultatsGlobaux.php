<?php
/*Page qui affiche les résultats globaux des tests */
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




    <div class="RésultatsGlobaux">
        <span class="Résultats globaux">
            <h1>Résultats globaux</h1>
            <?php echo printError($error); ?>
            <div class="testResults">
                <p> L'ID du test temps de réaction est 1.</br>L'ID du test gestion du stress est 2.</br>L'ID du test de reconnaissance de tonalité est 3.</br>L'ID du test seuil de perception est 4.</br>l'ID du psychoteste en ligne est 5.</br> </p>
            <?php

if ($NbreData != 0)
{
?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Type de test</th>
                        <th>Date </th>
                        <th>Durée</th>
                        <th>Localisation</th>
                        <th>Structure</th>
                        <th>Nom de l'instructeur</th>
                        <th>Prénom de l'instructeur</th>
                        <th>Nom du capteur</th>
                        <th>Score du test</th>
                        <th>Unité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    // pour chaque ligne (chaque enregistrement)
    foreach ( $rowAll as $row )
    {
        // DONNEES A AFFICHER dans chaque cellule de la ligne
?>
                    <tr>
                        <td data-label="ID"><?php echo $row[0]; ?></td>
                        <td data-label="Test"><?php echo $row[1]; ?></td>
                        <td data-label="Timeline"><?php echo $row[2]; ?></td>
                        <td data-label="Timeline"><?php echo $row[3]; ?></td>
                        <td data-label="Timeline"><?php echo $row[4]; ?></td>
                        <td data-label="Timeline"><?php echo $row[5]; ?></td>
                        <td data-label="Timeline"><?php echo $row[6]; ?></td>
                        <td data-label="Timeline"><?php echo $row[7]; ?></td>
                        <td data-label="Timeline"><?php echo $row[8]; ?></td>
                        <td data-label="Timeline"><?php echo $row[9]; ?></td>
                       
                    </tr>
                    
                    <?php
    } // fin foreach
?>
                </tbody>
            </table>
            <?php
} else { ?>
            <a> pas de données à afficher </a>
            <?php
}
?>
        </span>
        <p> Score total :</p>
    </div>
</div>



<script src="vues/js/form.js"></script>
<script src="script.js"></script>

</body>

</html>
