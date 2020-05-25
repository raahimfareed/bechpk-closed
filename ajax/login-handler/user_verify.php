<?php
session_start();
include_once('../../classes/user.class.php');
$User = new User();
if (isset($_POST['login_button'])) {
    switch ($User -> VerifyPassword($_POST['login_email'], $_POST['login_password'])) {
        case '10':
            echo 0;
            break;
        case '11':
            echo 1;
            break;
        case '12':
            $_SESSION['user_id'] = $User -> GetUserId($_POST['login_email']);
            echo 2;
            break;
        case '13':
            echo 3;
            break;
        default:
            echo 403;
            break;
    }
}