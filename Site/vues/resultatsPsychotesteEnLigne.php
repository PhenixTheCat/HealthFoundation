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
            <th>Id</th>
            <th>Date</th>
            <th>Durée</th>
            <th>Score</th>
            <th>Banc de test</th>
            <th>Données mesurées</th>
            <th>Pilote</th>
            <th>Formateur</th>

            
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
            <td data-label="ID"><?php echo $row['id']; ?></td>
            <td data-label="Date"><?php echo $row['date']; ?></td>
            <td data-label="Durée"><?php echo $row['duration']; ?></td>
            <td data-label="Score"><p id="score" class="invalid"><?php echo $row['score'];?></p></td>
            <td data-label="Banc de test"><?php echo $row['testbed']; ?></td>
            <td data-label="Données mesurées"><?php echo $row['measured_data']; ?></td>
            <td data-label="Pilote"><?php echo $row['pilot']; ?></td>
           
            <td data-label="Formateur"><?php echo $row['instructor']; ?></td>


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
