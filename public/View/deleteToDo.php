<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une tâche</title>
    <link rel="stylesheet" href="../build/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
    <script src="../build/js/front.js" defer></script>
</head>
<body>
    <main>
        <h1 class="center">Time Tracking <i class="far fa-clock"></i></h1>
        <a href="viewProject.php?id=<?=$_GET['id2']?>"><i class="far fa-arrow-alt-circle-left"></i></a>
        <div id="projects" class="flexCenter">
            <div class="project flexColumn width_60">
                <h2 class="center">Supprimer une tâche</h2>
                <div class="flexColumn width_100 pad15">
                    <form action="#" method="post" class="flexColumn width_60 auto">
                        <h3 class="center red">Voulez-vous vraiment supprimer cette tâche ?</h3>
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <input type="hidden" name="id2" value="<?=$_GET['id2']?>">
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
    if (isset($_POST['id'], $_POST['id2'])) {
        $project_fk = $_POST['id2'];
        $stmt = $bdd->prepare("DELETE FROM todo WHERE id = :id");
        $stmt->bindValue(":id", $_POST['id']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: viewProject.php?id=$project_fk&success=0");
        }
        else {
            echo "Erreur lors de la suppression d'une tâche !";
        }
    }
}