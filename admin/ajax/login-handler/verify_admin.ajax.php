<?php
session_start();
include_once('../../classes/admin.class.php');
$Admin = new Admin();
if (isset($_POST['login_button'])) {
    if ($Admin -> VerifyAdmin($_POST['admin_email'], $_POST['admin_password']) === true) {
        $_SESSION['admin_id'] = $Admin -> GetAdminId($_POST['admin_email']);
        echo 1;
    } else {
        echo 0;
    }
}