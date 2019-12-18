<?php
/* Page qui permet d'afficher les résultats du test de perception */
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Health Foundation</title>
    <link rel="stylesheet" media="screen" href="design.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>

    <div class="seuilDePerception">
      <div class="testResults">
        <h1><a href="seuilDePerception.php">Seuil de perception</a></h1>
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
                       <td><?php echo $row['score']; ?></td>
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

    </div>
    </div>



   
	  <script src="script.js"></script>

  </body>
</html>
