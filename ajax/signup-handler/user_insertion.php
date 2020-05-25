<?php
session_start();
if (isset($_POST['signup_button'])) {
    include_once('../../classes/user.class.php');
    $User = new User();

    $first_name = $_POST['signup_first_name'];
    $last_name = $_POST['signup_last_name'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $date = date('Y-m-d');
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'email';
        exit();
    } else {
        if ($User -> AjaxAddUser($first_name, $last_name, $email, $password, $date) === true) {
            $_SESSION['initial_signup'] = $first_name." ".$last_name;
            $User = null;
            echo 'success';
            exit();
        } else {
            echo 'error';
            exit();
        }

    }
} else {
    header('Location: ../../signup.php');
    exit();
}