<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_GET['user_id'])) {
    if (!empty($_SESSION['user_id']) && !empty($_GET['user_id'])) {
        if ($_SESSION['user_id'] === $_GET['user_id']) {
            session_unset();
            session_destroy();

            header('Location: ../index.php');
            exit();
        } else {
            header('Location: ../index.php');
            exit();
        }
    } else {
        header('Location: ../index.php');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}