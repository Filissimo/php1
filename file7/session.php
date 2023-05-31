<?php
session_start();
if (isset($_SESSION["user7"])) {
} else {
    $_SESSION["user7"]["nickname"] = "гость";
    $_SESSION["user7"]["status"] = "guest";
}
?>