<?php
session_start();
$_SESSION['errors_array'] = [];
if(isset($_POST['signup_submit'])) {
    require_once('../../classes/user.class.php');

    $first_name = $_POST['signup_first_name'];
    $last_name = $_POST['signup_last_name'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $confirm_password = $_POST['signup_confirm_password'];
    $date = date('Y-m-d');

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['signup_first_name'] = $first_name;
        $_SESSION['signup_last_name'] = $last_name;
        $_SESSION['signup_email'] = $email;
        array_push($_SESSION['errors_array'], "Please fill all the fields!");
        header('Location: ../../signup.php?error=empty');
        exit();
    } else if (!preg_match("/^[A-Za-z]*$/", $first_name) || !preg_match("/^[A-Za-z]*$/", $last_name)) {
        $_SESSION['signup_first_name'] = $first_name;
        $_SESSION['signup_last_name'] = $last_name;
        $_SESSION['signup_email'] = $email;
        array_push($_SESSION['errors_array'], "Please enter a valid name!");
        header('Location: ../../signup.php?error=name');
        exit();
    } else if (strlen($first_name) > 25 || strlen($last_name) > 25 || strlen($first_name) < 3 || strlen($last_name) < 3) {
        $_SESSION['signup_first_name'] = $first_name;
        $_SESSION['signup_last_name'] = $last_name;
        $_SESSION['signup_email'] = $email;
        array_push($_SESSION['errors_array'], "Please enter a valid name!");
        header('Location: ../../signup.php?error=name');
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['signup_first_name'] = $first_name;
        $_SESSION['signup_last_name'] = $last_name;
        $_SESSION['signup_email'] = $email;
        array_push($_SESSION['errors_array'], "Please enter a valid email!");
        header('Location: ../../signup.php?error=email');
        exit();
    } else if (strlen($email) > 200) {
        $_SESSION['signup_first_name'] = $first_name;
        $_SESSION['signup_last_name'] = $last_name;
        $_SESSION['signup_email'] = $email;
        array_push($_SESSION['errors_array'], "Your email can't be longer than 200 characters");
        header('Location: ../../signup.php?error=email');
        exit();
    } else if ($password != $confirm_password) {
        $_SESSION['signup_first_name'] = $first_name;
        $_SESSION['signup_last_name'] = $last_name;
        $_SESSION['signup_email'] = $email;
        array_push($_SESSION['errors_array'], "Passwords do not match");
        header('Location: ../../signup.php?error=password');
        exit();
    } else {
        $Dbh = new Dbh();
        $sql = "SELECT * from users where `Email` = ?";
        $stmt = $Dbh -> GetDB() -> prepare($sql);
        if ($stmt -> execute([$email])) {
            if ($stmt -> rowCount() >= 1) {
                $_SESSION['signup_first_name'] = $first_name;
                $_SESSION['signup_last_name'] = $last_name;
                $_SESSION['signup_email'] = $email;
                array_push($_SESSION['errors_array'], "Email is already taken");
                header('Location: ../../signup.php?error=taken');
                exit();
            }
        } else {
            $_SESSION['signup_first_name'] = $first_name;
            $_SESSION['signup_last_name'] = $last_name;
            $_SESSION['signup_email'] = $email;
            array_push($_SESSION['errors_array'], "An error occurred, please try again later!");
            header('Location: ../../signup.php');
            exit();
        }
        
        $user_id = md5(uniqid('', true));
        $sql = "SELECT * from users where `UserId` = ?";
        $stmt = $Dbh -> GetDB() -> prepare($sql);
        if ($stmt -> execute([$user_id])) {
            while ($stmt -> rowCount() >= 1) {
                $user_id = md5(uniqid('', true));
            }
        } else {
            $_SESSION['signup_first_name'] = $first_name;
            $_SESSION['signup_last_name'] = $last_name;
            $_SESSION['signup_email'] = $email;
            array_push($_SESSION['errors_array'], "An error occurred, please try again later!");
            header('Location: ../../signup.php');
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT into users (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `RegistrationDate`) values (?, ?, ?, ?, ?, ?);";

        $stmt = $Dbh -> GetDB() -> prepare($sql);
        
        if ($stmt -> execute([$user_id, $first_name, $last_name, $email, $hashed_password, $date])) {
            unset($_SESSION['signup_first_name']);
            unset($_SESSION['signup_last_name']);
            unset($_SESSION['signup_email']);
            $_SESSION['initial_signup'] = $first_name." ".$last_name;
            header('Location: ../../init_signup.php');
            exit();
        } else {
            $_SESSION['signup_first_name'] = $first_name;
            $_SESSION['signup_last_name'] = $last_name;
            $_SESSION['signup_email'] = $email;
            array_push($_SESSION['errors_array'], "An error occurred, please try again later!");
            header('Location: ../../signup.php');
            exit();
        }

    }
} else {
    header('Location: ../../signup.php');
    exit();
}