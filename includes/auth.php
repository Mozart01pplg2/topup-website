<?php
session_start();
function check_admin() {
    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
        exit;
    }
}
?>
