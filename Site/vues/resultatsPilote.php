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
        <h1>Resultats pilote</h1>
        
    </br>
      <img src="index.php?redirect=user&function=chartBar">
    </div>

     

    <?php echo printError($error); ?>
    <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?>

    <div class="tableau">
        <h3> Mes pilotes </h3>
        <form action="" id="searchUser" method="post">
            <input id="search" name="searchUser" type="text" placeholder="Rechercher" />
            <input class="submitButtons" type="submit" name="rechercher" value="Rechercher" />
        </form>

        <table border="1" class="resultatPilote">
            <thead>
                <tr>
                     <th>Sexe </th>
                    <th>Nom </th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Résultats</th>

                </tr>
            </thead>
            <tbody>
                <?php  if(!empty($userByInstructor)) { ?>

                <?php foreach ($userByInstructor as $user) { ?>
                <tr>
                <td data-label="Sex">
                        <php><?php echo $user['sex']; ?></php>
                    </td>
                    <td data-label="Nom">
                        <php><?php echo $user['last_name']; ?></php>
                    </td>
                    <td data-label="Prénom">
                        <php><?php echo $user['first_name']; ?></php>
                    </td>
                    <td data-label="Date de naissance">
                        <php><?php echo $user['birthdate']; ?></php>
                    </td>
                    
                        <td data-label="Résultats">
                            <form action="" id="showResults" method="post">
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <input class="gestionButtons" type="submit" name="results" value="Page de résultats" /> </br>
                            </form>
                        </td>
                </tr>


                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <?php endif;?>
    <script src="script.js"></script>

</body>

</html>