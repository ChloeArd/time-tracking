<?php

use Chloe\Timetracking\Model\DB;

session_start();
if (isset($_SESSION['id'])) {?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Projet</title>
        <link rel="stylesheet" href="../build/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
        <script src="../build/js/front.js" defer></script>
    </head>
    <body>
        <main>
            <h1 class="center">Time Tracking <i class="far fa-clock"></i></h1>
            <a href="../index.php"><i class="far fa-arrow-alt-circle-left"></i></a>

            <div id="projectOnly" class="flexCenter flexRow wrap"></div>
        </main>
    </body>
    </html>
<?php
}