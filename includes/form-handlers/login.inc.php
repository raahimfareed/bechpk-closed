<?php
session_start();
$_SESSION['login_errors_array'] = [];
if (isset($_POST['login_button'])) {
    require_once('../../classes/user.class.php');

    $email = $_POST['login_email'];
    $password = $_POST['login_password'];
    $_SESSION['login_email'] = $email;

    if (empty($email) || empty($password)) {
        array_push($_SESSION['login_errors_array'], "Please fill all the fields!");
        header('Location: ../../index.php?error=empty');
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($_SESSION['login_errors_array'], "Please enter a valid email!");
        header('Location: ../../index.php?error=email');
    } else {
        $User = new User();
        switch ($User -> LoginUser($email, $password)) {
            case 10:
                array_push($_SESSION['login_errors_array'], "Account does not exist!");
                header('Location: ../../index.php?error=account');
                break;
            case 11:
                array_push($_SESSION['login_errors_array'], "Incorrect password");
                header('Location: ../../index.php?error=password');
                break;
            case 12:
                $sql = "SELECT * from users where Email = ?";
                $stmt = $User -> GetDB() -> prepare($sql);
                $stmt -> execute([$email]);
                $row = $stmt -> fetch();
                unset($_SESSION['login_email']);
                unset($_SESSION['login_errors_array']);
                $_SESSION['user_id'] = $row['UserId'];
                header("Location: ../../index.php?user={$row['UserId']}");
                break;
            case 13:
                array_push($_SESSION['login_errors_array'], "Your account is temporarily banned!");
                header('Location: ../../index.php?error=tempbanned');
                break;

            default:
                array_push($_SESSION['login_errors_array'], "An error occurred!");
                header('Location: ../../index.php?error=unknown');
                break;
        }
    }


} 