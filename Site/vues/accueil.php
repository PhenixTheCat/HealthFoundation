<?php
/* Page d'accueil du site web */
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


    <div class="specialTest"></div>
    <section class="section1">
        <div>

            <img src="Images/fond1.png" class="photoAccueil" alt=<?php echo _("Fond d'accueil");?></im>>
            <div class="texteGauche">
                <h2><?php echo _("&#34;A LEGACY OF EXCELLENCE&#34;");?></h2>
                <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?>
                    <a  class ="boutonTest "href="index.php?redirect=user&function=gestionDesUtilisateurs" ><?php echo _(" Gestion des utilisateurs");?></a>
                <?php endif;?>
                <?php if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?>
                    <a  class ="boutonTest "href="index.php?redirect=user&function=resultatsPilote" > <?php echo _("Consulter les résulats des pilotes");?></a>

                        <?php endif;?>
                        <?php if($_SESSION['isConnected']&& $_SESSION['userType'] == "Pilot") : ?>
                            <a  class ="boutonTest" href="index.php?redirect=user&function=psychotestEnLigne" ><?php echo _(" Passer le test en ligne");?></a>

                
                            <?php endif;?>

                            <?php if(!$_SESSION['isConnected']) : ?>
                                <a  class ="boutonTest "href="index.php?redirect=user&function=connexion" > <?php echo _("Connectez vous pour accéder au test en ligne");?></a>

                            <?php endif;?>
                                <img src="Images/AppLogo.png" class="logoApp" alt=<?php echo _("Logo solution APP");?>>
                           
            </div>

        </div>
    </section>

    <section class="section2">
        <h2><?php echo _("Nos services");?></h2>
        <div class="menuInformations">
            <div class="ligneMenu">
                <div class="partieMenu">
                    <img src="Images/coeur.png" class="logo" alt=<?php echo _("Logo coeur");?></im>>
                    <div><?php echo _("Réalisations de tests du rythme cardiaque grâce aux électrodes");?></div>
                </div>
                <div class="partieMenu">
                    <img src="Images/poumon.png" class="logo" alt=<?php echo _("Logo poumon");?></im>>
                    <div><?php echo _("Réalisations de tests respiratoires grâce aux examens de bronchoscopie");?></div>
                </div>
            </div>
            <div class="ligneMenu">
                <div class="partieMenu">
                    <img src="Images/oreille.png" class="logo" alt=<?php echo _("Logo oeil");?></im>>
                    <div><?php echo _("Réalisations de tests d’acuité visuelle grâce à l’OCULUS Binoptometer 4P");?></div>
                </div>
                <div class="partieMenu">
                    <img src="Images/oeil.png" class="logo" alt=<?php echo _("Logo oreille");?>>
                    <div><?php echo _("Réalisations de tests auditifs grâce aux examens d’otoscopie et d’audiométrie");?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section3">
        <h2><?php echo _("Actualités");?></h2>
        <div class="sectionInformations">
            <div class="ligneInformation">
                <div class="info1">
                    <h3><?php echo _("Notre environnement");?></h3>
                    <div>
                        <?php echo _("Parcourez nos plus grands sites de productions ainsi que nos laboratoires de tests et
                        simulations.");?>
                    </div>
                </div>
                <div class="info2">
                    <h3><?php echo _("Nos collaborateurs");?></h3>
                    <div>
                        <?php echo _("Des équipes de techniciens, ingénieurs,
                        et médecins experts collaborent chaque jour pour répondre à vos besoins.");?>
                    </div>
                </div>
            </div>
            <div class="ligneInformation">
                <div class="info1">
                    <h3><?php echo _("Nos investisseurs");?></h3>
                    <div>
                        <?php echo _("Le ministère des Armées et L'ISEP se sont engagés à nos côtés.");?>
                    </div>
                </div>
                <div class="info2">
                    <h3><?php echo _("Notre design");?></h3>
                    <div>
                        <?php echo _("Chacun de nos produits est
                        conçu dans un design unique
                        et purement ergonomique.");?>
                    </div>
                </div>
            </div>
            <div class="ligneInformation">
                <div class="info1">
                    <h3><?php echo _("Nos technologies de pointe");?></h3>
                    <div>
                        <?php echo _("Découvrez nos technologies les
                        plus performantes et récentes,
                        mises à jour spécialement pour vous.");?>
                    </div>
                </div>
                <div class="info2">
                    <h3><?php echo _("Nos produits à venir");?></h3>
                    <div>
                        <?php echo _("Restez informés de nos futurs produits
                        lors de nos prochaines conférences
                        et présentations .");?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="script.js"></script>
</body>

</html>
