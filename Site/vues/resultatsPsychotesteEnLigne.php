<?php
/* Page qui affiche les résultats du psychoteste en ligne */

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



  <div class="RésultatsEnLigne">
    <span class="Résultats">
      <h1>Résultats</h1>
      <?php
if ($NbreData != 0)
{
?>
      <table border="1">
        <thead>
          <tr>
            <th>id</th>
            <th>date</th>
            <th>durée</th>
            <th>score</th>
            <th>banc de test</th>
            <th>données mesurées</th>
            <th>pilot</th>
            <th>instructeur</th>
            <th>capteur</th>
            
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
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><html><p id="score" class="invalid"><?php echo $row['score'];?></p></html></td>
            <td><?php echo $row['testbed']; ?></td>
            <td><?php echo $row['measured_data']; ?></td>
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



<script src="js/form.js"></script>

 

</body>

</html>
