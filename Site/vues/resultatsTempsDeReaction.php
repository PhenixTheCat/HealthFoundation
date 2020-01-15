<?php
/*Page qui permet d'afficher les tests du temps de réaction */

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



  <div class="tempsDeReaction">

      <h1><?php echo _("Temps de réaction");?></h1>
      <div class="testResults">
      <img src="index.php?redirect=user&function=chartReactionTime">
      <?php

if ($NbreData != 0)
{
?>
      <table border="1">
        <thead>
          <tr>
            <th><?php echo _("id");?></th>
            <th><?php echo _("test");?></th>
            <th><?php echo _("timeline");?></th>
            <th><?php echo _("value");?></th>
            <th><?php echo _("type");?></th>
            <th><?php echo _("unité");?></th>
            <th><?php echo _("date");?></th>
            <th><?php echo _("durée");?></th>
            <th><?php echo _("score");?></th>
            <th><?php echo _("banc de test");?></th>
            <th><?php echo _("pilot");?></th>
            <th><?php echo _("instructeur");?></th>
            <th><?php echo _("capteurs");?></th>
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
      <a> <?php echo _("pas de données à afficher");?> </a>
      <?php
}
?>
    </div>
  </div>
<script src="vues/js/form.js"></script>
<script src="script.js"></script>

</body>

</html>
