<?php
include_once('../../classes/admin.class.php');
$Admin = new Admin();
if ($Admin -> CheckAdmin($_POST['admin_email']) === true) {
    echo 1;
} else {
    echo 0;
}