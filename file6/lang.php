<?php
    session_start();
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'rus';
    }
    if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
    }
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
    }
?>