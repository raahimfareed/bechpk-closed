<?php
session_start();
$_SESSION['signup_errors_array'] = [];
if(isset($_POST['signup_submit'])) {
    require_once('../../classes/user.class.php');

    $first_name = $_POST['signup_first_name'];
    $last_name = $_POST['signup_last_name'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $confirm_password = $_POST['signup_confirm_password'];
    $date = date('Y-m-d');
    $_SESSION['signup_first_name'] = $first_name;
    $_SESSION['signup_last_name'] = $last_name;
    $_SESSION['signup_email'] = $email;

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        array_push($_SESSION['signup_errors_array'], "Please fill all the fields!");
        header('Location: ../../signup.php?error=empty');
        exit();
    } else if (!preg_match("/^[A-Za-z]*$/", $first_name) || !preg_match("/^[A-Za-z]*$/", $last_name)) {
        array_push($_SESSION['signup_errors_array'], "Please enter a valid name!");
        header('Location: ../../signup.php?error=name');
        exit();
    } else if (strlen($first_name) > 25 || strlen($last_name) > 25 || strlen($first_name) < 3 || strlen($last_name) < 3) {
        array_push($_SESSION['signup_errors_array'], "Please enter a valid name!");
        header('Location: ../../signup.php?error=name');
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($_SESSION['signup_errors_array'], "Please enter a valid email!");
        header('Location: ../../signup.php?error=email');
        exit();
    } else if (strlen($email) > 200) {
        array_push($_SESSION['signup_errors_array'], "Your email can't be longer than 200 characters");
        header('Location: ../../signup.php?error=email');
        exit();
    } else if ($password != $confirm_password) {
        array_push($_SESSION['signup_errors_array'], "Passwords do not match");
        header('Location: ../../signup.php?error=password');
        exit();
    } else {
        $User = new User();
        $sql = "SELECT * from users where `Email` = ?";
        $stmt = $User -> GetDB() -> prepare($sql);
        if ($stmt -> execute([$email])) {
            if ($stmt -> rowCount() >= 1) {
                array_push($_SESSION['signup_errors_array'], "Email is already taken");
                header('Location: ../../signup.php?error=taken');
                exit();
            }
        } else {
            array_push($_SESSION['signup_errors_array'], "An error occurred, please try again later!");
            header('Location: ../../signup.php');
            exit();
        }
        
        $user_id = md5(uniqid('', true));
        $sql = "SELECT * from users where `UserId` = ?";
        $stmt = $User -> GetDB() -> prepare($sql);
        if ($stmt -> execute([$user_id])) {
            while ($stmt -> rowCount() >= 1) {
                $user_id = md5(uniqid('', true));
            }
        } else {
            array_push($_SESSION['signup_errors_array'], "An error occurred, please try again later!");
            header('Location: ../../signup.php');
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $rand = rand(1, 16); // Random number in between 1 and 16

        switch ($rand) {
            case 1:
                $profile_pic = "assets/images/profile-pics/defaults/head_alizarin.png";
                break;
            case 2:
                $profile_pic = "assets/images/profile-pics/defaults/head_amethyst.png";
                break;
            case 3:
                $profile_pic = "assets/img/profile-pics/defaults/head_belize_hole.png";
                break;
            case 4:
                $profile_pic = "assets/img/profile-pics/defaults/head_carrot.png";
                break;
            case 5:
                $profile_pic = "assets/img/profile-pics/defaults/head_deep_blue.png";
                break;
            case 6:
                $profile_pic = "assets/img/profile-pics/defaults/head_emerald.png";
                break;
            case 7:
                $profile_pic = "assets/img/profile-pics/defaults/head_green_sea.png";
                break;
            case 8:
                $profile_pic = "assets/img/profile-pics/defaults/head_nephritis.png";
                break;
            case 9:
                $profile_pic = "assets/img/profile-pics/defaults/head_pete_river.png";
                break;
            case 10:
                $profile_pic = "assets/img/profile-pics/defaults/head_pomegranate.png";
                break;
            case 11:
                $profile_pic = "assets/img/profile-pics/defaults/head_pumpkin.png";
                break;
            case 12:
                $profile_pic = "assets/img/profile-pics/defaults/head_red.png";
                break;
            case 13:
                $profile_pic = "assets/img/profile-pics/defaults/head_sun_flower.png";
                break;
            case 14:
                $profile_pic = "assets/img/profile-pics/defaults/head_turqoise.png";
                break;
            case 15:
                $profile_pic = "assets/img/profile-pics/defaults/head_wet_asphalt.png";
                break;
            case 16:
                $profile_pic = "assets/img/profile-pics/defaults/head_wisteria.png";
                break;
            default:
                $profile_pic = "assets/img/profile-pics/defaults/head_wet_asphalt.png";
                break;
        }
        
        if ($User -> AddUser($user_id, $first_name, $last_name, $email, $hashed_password, $profile_pic, $date) === true) {
            unset($_SESSION['signup_first_name']);
            unset($_SESSION['signup_last_name']);
            unset($_SESSION['signup_email']);
            unset($_SESSION['signup_errors_array']);
            $_SESSION['initial_signup'] = $first_name." ".$last_name;
            $User = null;
            header('Location: ../../init_signup.php');
            exit();
        } else {
            array_push($_SESSION['signup_errors_array'], "Could not signup, please try again later!");
            header('Location: ../../signup.php');
            exit();
        }

    }
} else {
    header('Location: ../../signup.php');
    exit();
}