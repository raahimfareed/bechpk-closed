<?php
session_start();
require_once('classes/admin.class.php');
$Admin = new Admin();
$Admin -> GetInfo($_SESSION['admin_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
    <link rel="stylesheet" href="assets/css/sidenav.css">

    <title>Bech.pk - Admin Panel</title>
</head>

<body class="grey lighten-4">
    <?php include('modules/navbar.php'); ?>
    <?php include('modules/sidenav.php'); ?>
    
    <div class="container">
        <?php
        if (!isset($_GET['p']) || empty($_GET['p'])) {
            include('modules/main_dashboard.php');
        } else {
            switch ($_GET['p']) {
                default:
                include('modules/error.php');
                break;
            }
        }
        ?>
    </div>

    <?php include('modules/footer.php'); ?>
    
    <?php include('modules/scripts.php'); ?>
</body>

</html>