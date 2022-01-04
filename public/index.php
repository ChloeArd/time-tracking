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
            <div class="border flexRow align">
                <p class="question">Voulez-vous ajoutez un projet ?</p>
                <a href="View/addProject.php" class="addProject align"><i class="fas fa-plus-square"></i> Projet</a>
            </div>
            <div id="projectsHome" class="flexCenter flexRow wrap"></div>
    </main>
</body>
</html>