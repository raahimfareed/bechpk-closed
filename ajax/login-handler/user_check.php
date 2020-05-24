<?php
include_once('../../classes/user.class.php');
$User = new User();
if ($User -> UserExists($_POST['login_email']) === true) {
    echo $_POST;
} else {
    echo $_POST;
}