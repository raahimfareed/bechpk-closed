<?php
session_start();
// $_SESSION['login_errors_array'] = [];
if (isset($_POST['login_button'])) {
    require_once('../../classes/user.class.php');

    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    if (empty($email) || empty($password)) {
        echo 0;
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 1;
        exit();
    } else {
        $User = new User();
        switch ($User -> LoginUser($email, $password)) {
            case 10:
                echo 2;
                break;
            case 11:
                $sql = "SELECT * from users where Email = ?";
                $stmt = $User -> GetDB() -> prepare($sql);
                $stmt -> execute([$email]);
                $row = $stmt -> fetch();
                $_SESSION['user_id'] = $row['UserId'];
                break;
            case 12:

                break;
            
            default:

                break;
        }
    }


}