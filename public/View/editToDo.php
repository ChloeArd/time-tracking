
<?php
use Chloe\Timetracking\DB;
require "../../DB.php";
$bdd = DB::getInstance();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
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
                <h2 class="center">Modifier une tâche</h2>
                <div class="flexColumn width_100 pad15">
                    <form action="" method="post" class="flexColumn width_60 auto">
                        <?php
                        $stmt = $bdd->prepare("SELECT * from todo WHERE id = :id");
                        $stmt->bindValue(":id", $_GET['id']);
                        $state = $stmt->execute();

                        if ($state) {
                            foreach ($stmt->fetchAll() as $todo) {?>
                                <input name="name" type="text" value="<?=$todo['name']?>">
                                <input name="id" type="hidden" value="<?=$_GET['id']?>">
                                <input name="id2" type="hidden" value="<?=$_GET['id2']?>">
                                <input type="submit" name="send" value="Modifier">
                                <?php
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php
if (isset($_POST['send'])) {
    if (isset($_POST['id'], $_POST['name'], $_POST['id2'])) {
        $project_fk = $_POST['id2'];
        $stmt = $bdd->prepare("UPDATE todo SET name = :name WHERE id = :id");
        $stmt->bindValue(":id", $_POST['id']);
        $stmt->bindValue(":name", htmlentities(trim(ucfirst($_POST['name']))));
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: viewProject.php?id=$project_fk&success=0");
        }
        else {
            echo "Erreur lors de la modification de l'intitulé de la tâche !";
        }
    }
}