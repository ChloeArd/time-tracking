<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="./build/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
    <script src="./build/js/front.js" defer></script>
</head>
<body>
    <main>
        <h1 class="center">Time Tracking <i class="far fa-clock"></i></h1>
        <?php
        if (isset($_SESSION['id'])) { ?>
                <h3 class="center hello">Bonjour <?=$_SESSION['firstname'] ?> !</h3>
            <div class="border flexRow align">
                <p class="question">Voulez-vous ajoutez un projet ?</p>
                <a href="View/addProject.php" class="addProject align"><i class="fas fa-plus-square"></i> Projet</a>
            </div>
            <a href="./build/php/disconnection.php" id="disconnection" class="center">Déconnexion</a>
            <div id="projectsHome" class="flexCenter flexRow wrap"></div>
        <?php
        }
        else { ?>
            <div class="accountUser flexCenter flexColumn">
                <p>Connectez-vous ou inscrivez-vous !</p>
                <div class="flexRow">
                    <a class="buttonOrange" href="View/registration.php">Inscription</a>
                    <a class="buttonOrange" href="View/connection.php">Connexion</a>
                </div>

            </div>
        <?php
        } ?>
    </main>
</body>
</html>