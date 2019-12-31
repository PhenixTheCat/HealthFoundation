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

            <img src="Images/fond1.png" class="photoAccueil" alt="Fond">
            <div class="texteGauche">
                <h2>"A LEGACY OF EXCELLENCE"</h2>
                <?php //Si l'utilisateur est connecté
                    if($_SESSION['isConnected']&& $_SESSION['userType'] == "Administrator") : ?>
                <form action="index.php?redirect=user&function=gestionDesUtilisateurs"><button type="submit"
                        class="boutonTest">Gestion des utilisateurs</button>
                    <?php endif;?>
                    <?php if($_SESSION['isConnected']&& $_SESSION['userType'] == "Instructor") : ?>
                    <form action="index.php?redirect=user&function=resultatsPilote"><button type="submit"
                            class="boutonTest">Consulter les résulats des pilotes</button>
                        <?php endif;?>
                        <?php if($_SESSION['isConnected']&& $_SESSION['userType'] == "Pilot") : ?>
                        <form action="index.php?redirect=user&function=testEnLigne"><button type="submit"
                                class="boutonTest">Consulter les résulats des pilotes</button>
                            <?php endif;?>

                            <?php if(!$_SESSION['isConnected']) : ?>
                            <form action="index.php?redirect=user&function=connexion"><button type="submit"
                                    class="boutonTest">Connectez-vous pour passer le test en ligne</button>
                                <?php endif;?>
                                <img src="Images/AppLogo.png" class="logoApp" alt="Logo solution APP">
                            </form>
            </div>

        </div>
    </section>

    <section class="section2">
        <h2>Nos services</h2>
        <div class="menuInformations">
            <div class="ligneMenu">
                <div class="partieMenu">
                    <img src="Images/coeur.png" class="logo" alt="Logo coeur">
                    <div>Réalisations de tests du rythme cardiaque grâce aux électrodes</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/poumon.png" class="logo" alt="Logo poumon">
                    <div>Réalisations de tests respiratoires grâce aux examens de bronchoscopie</div>
                </div>
            </div>
            <div class="ligneMenu">
                <div class="partieMenu">
                    <img src="Images/oreille.png" class="logo" alt="Logo oeil">
                    <div>Réalisations de tests d’acuité visuelle grâce à l’OCULUS Binoptometer 4P</div>
                </div>
                <div class="partieMenu">
                    <img src="Images/oeil.png" class="logo" alt="Logo oreille">
                    <div>Réalisations de tests auditifs grâce aux examens d’otoscopie et d’audiométrie</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section3">
        <h2>Actualités</h2>
        <div class="sectionInformations">
            <div class="ligneInformation">
                <div class="info1">
                    <h3>Notre environnement</h3>
                    <div>
                        Parcourez nos plus grands sites de productions ainsi que nos laboratoires de tests et
                        simulations.
                    </div>
                </div>
                <div class="info2">
                    <h3>Nos collaborateurs</h3>
                    <div>
                        Des équipes de techniciens, ingénieurs,
                        et médecins experts collaborent chaque jour pour répondre à vos besoins.
                    </div>
                </div>
            </div>
            <div class="ligneInformation">
                <div class="info1">
                    <h3>Nos investisseurs</h3>
                    <div>
                        Le ministère des Armées et L'ISEP se sont engagés à nos côtés.
                    </div>
                </div>
                <div class="info2">
                    <h3>Notre design</h3>
                    <div>
                        Chacun de nos produits est
                        conçu dans un design unique
                        et purement ergonomique.
                    </div>
                </div>
            </div>
            <div class="ligneInformation">
                <div class="info1">
                    <h3>Nos technologies de pointe</h3>
                    <div>
                        Découvrez nos technologies les
                        plus performantes et récemment
                        mises au jour pour vous.
                    </div>
                </div>
                <div class="info2">
                    <h3>Nos produits à venir</h3>
                    <div>
                        Restez informés de nos futurs produits
                        lors de nos prochaines conférences
                        et présentations .
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="script.js"></script>
</body>

</html>
