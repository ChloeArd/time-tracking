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
        <h3 class="center">Inscription</h3>
        <form method="post" action="../build/php/registration.php" class="flexColumn flexCenter width80 auto">
            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname" required>
            <label for="mail">Mail</label>
            <input type="email" id="mail" name="email" required>
            <label for="pass">Mot de passe</label>
            <input type="password" id="pass" name="password" required>
            <label for="passR">Répet du mot de passe</label>
            <input type="password" id="passR" name="passwordR" required>
            <input type="submit" name="submit" value="M'inscrire" class="button">
        </form>
    </main>
</body>
</html>