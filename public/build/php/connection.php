<?php
use Chloe\Timetracking\Model\DB;

use RedBeanPHP\R;
require "../../../vendor/autoload.php";

require "../../../source/Model/DB.php";

if (isset($_POST["email"], $_POST["password"])) {
    $bdd = DB::getInstance();

    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));

    // I get the name of the user
    $stmt = R::find("user", "email = ?", [$email]);

    foreach ($stmt as $user) {
        // I check that the password encrypted on my database that I retrieved using the '$ user [' password ']' loop corresponds to the password entered by the user
        if (password_verify($password, $user->password)) {
            // If the 2 password correspond then we open the session and we store the user's data in a session.
            session_start();
            $_SESSION['id'] = $user->id;
            $_SESSION['firstname'] = $user->firstname;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $id = $_SESSION['id'];

            header("Location: ../../success=0");
        } else {
            header("Location: ../../View/connection.php?error=0");
        }
    }
}
else {
    header("Location: ../../View/connection.php?error=1");
}