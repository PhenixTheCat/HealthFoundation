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
            <img src="index.php?redirect=user&function=chartStress">
                <p> L'ID du test temps de réaction est 1.</br>L'ID du test gestion du stress est 2.</br>L'ID du test de reconnaissance de tonalité est 3.</br>L'ID du test seuil de perception est 4.</br>l'ID du psychoteste en ligne est 5.</br> </p>
            <?php

if ($NbreData != 0)
{
?>
            <table border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>test</th>
                        <th>timeline</th>
                        <th>value</th>
                        <th>type</th>
                        <th>unité</th>
                        <th>date</th>
                        <th>durée</th>
                        <th>score</th>
                        <th>banc de test</th>
                        <th>pilot</th>
                        <th>instructeur</th>
                        <th>capteurs</th>
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
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['test']; ?></td>
                        <td><?php echo $row['timeline']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['unit']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['duration']; ?></td>
                        <td><html><p id="score" class="invalid"><?php echo $row['score'];?></p></html></td>
                        <td><?php echo $row['testbed']; ?></td>
                        <td><?php echo $row['pilot']; ?></td>
                        <td><?php echo $row['instructor']; ?></td>
                        <td><?php echo $row['sensor']; ?></td>
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
    </div>
</div>



<script src="vues/js/form.js"></script>
<script src="script.js"></script>

</body>

</html>
