<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un projet</title>
    <link rel="stylesheet" href="../build/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
    <script src="../build/js/front.js" defer></script>
</head>
<body>
    <main>
        <h1 class="center">Time Tracking <i class="far fa-clock"></i></h1>
        <a href="../index.php"><i class="far fa-arrow-alt-circle-left"></i></a>
        <div id="projects" class="flexCenter">
            <div class="project flexColumn width_60">
                <h2 class="center">Supprimer un projet</h2>
                <div class="flexColumn width_100 pad15">
                    <form action="" method="post" class="flexColumn width_60 auto">
                        <h3 class="center red">Voulez-vous vraiment supprimer ce projet ?</h3>
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <input type="submit" name="send" value="Oui">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<?php
use Chloe\Timetracking\DB;
require "../../DB.php";
$bdd = DB::getInstance();

if (isset($_POST['send'])) {
    if (isset($_POST['id'])) {
        $stmt = $bdd->prepare("DELETE FROM todo WHERE project_fk = :project_fk");
        $stmt->bindValue(":project_fk", $_POST['id']);
        $stmt->execute();
        $stmt = $bdd->prepare("DELETE FROM project WHERE id = :id");
        $stmt->bindValue(":id", $_POST['id']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: ../index.php?success=0");
        }
        else {
            echo "Erreur lors de la suppression du projet !";
        }
    }
}