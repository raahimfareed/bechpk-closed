<?php
session_start();

if (isset($_SESSION['user_id'])) {
    session_unset();
    session_destroy();
    echo 1;
    exit();
} else {
    echo 'Hello dear fellow 🙂';
}