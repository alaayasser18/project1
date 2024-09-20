<?php
session_start();

function check_login() {
    if (!isset($_SESSION['manager_id'])) {
        header("Location: login.php");
        exit();
    }
}

function check_logged_out() {
    if (isset($_SESSION['manager_id'])) {
        header("Location: index.php");
        exit();
    }
}
?>