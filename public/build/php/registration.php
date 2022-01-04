<?php

use Chloe\Timetracking\Model\DB;

use RedBeanPHP\R;
require "../../../vendor/autoload.php";

require "../../../source/Model/DB.php";

if (isset($_POST["firstname"], $_POST["email"], $_POST["password"], $_POST['passwordR'])) {
    $bdd = DB::getInstance();

    $firstname = htmlentities(trim($_POST["firstname"]));
    $email = htmlentities(trim($_POST["email"]));
    $password = htmlentities(trim($_POST["password"]));
    $passwordR = htmlentities(trim($_POST['passwordR']));

    // I encrypt the password.
    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $maj = preg_match('@[A-Z]@', $password);
        $min = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        // Check if the 2 entered passwords are identical
        if ($password === $passwordR) {
            // Checks if the password contains upper case, lower case, number and at least 8 characters.
            if ($maj && $min && $number && strlen($password) >= 8) {
                $sql = R::findOrCreate("user", ['firstname' => $firstname, 'email' => $email, 'password' => $encryptedPassword]);

                if (is_null($sql->in_stock)) {
                    header("Location: ../../success=0");
                } else {
                    header("Location: ../../View/registration.php?error=0");
                }
            } else {
                header("Location: ../../View/registration.php?error=2");
            }
        } else {
            header("Location: ../../View/registration.php?error=3");
        }
    } else {
        header("Location: ../../View/registration.php?error=4");
    }
}
else {
    header("Location: ../../View/registration.php?error=5");
}