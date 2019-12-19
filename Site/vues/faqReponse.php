<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" media="screen" href="design.css" />
    <title>Healthfoundation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="pasImage">


    <div class="headerContact">
        <h1>Question posée dans la FAQ</h1>
    </div>

    <?php  if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?>
    <div class="resultatsParCat">

        <?php  if(!empty($answer)) { ?>

        <?php foreach ($answer as $ans) { ?>
        <php><?php echo $ans['last_name']; ?></php>
        <php><?php echo $ans['first_name']; ?></php>
        <php><?php echo $ans['email']; ?></php>
        </br>
        <php><?php echo $ans['question']; ?></php>
        <form action="" method="POST">
            <input type="hidden" name="email" value="<?php echo $ans['email']; ?>">
            <input type="hidden" name="id" value="<?php echo $ans['id']; ?>">
            <input type="text" name="answer">
            </br>
            <input class="submitButtons" type="submit" name="Envoyer" Value="Envoyer">
        </form>

        <?php } ?>
        <?php } ?>
        <?php endif;?>

    </div>
    </div>
    <script src="script.js"></script>

</body>

</html>