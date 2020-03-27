<?php
/* Page qui permet d'afficher les résultats du test de perception */
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

  <div class="seuilDePerception">
      <h1><a href="seuilDePerception.php">Seuil de perception</a></h1>
      <div class="testResults">
      <img src="index.php?redirect=user&function=chartPerception">
      
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
}else { ?>
      <a> pas de données à afficher </a>
      <?php
}
?>

    </div>
  </div>

<script src="vues/js/form.js"></script>
<script src="script.js"></script>

</body>

</html>
