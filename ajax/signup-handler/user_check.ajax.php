<?php
if (isset($_POST['signup_button'])) {
    include_once('../../classes/user.class.php');
    $User = new User();
    if ($User -> UserExists($_POST['signup_email']) === true) {
        echo 1;
    } else {
        echo 0;
    }
}