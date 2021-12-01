<?php
session_start();
if($_SESSION['login']!=true) {
    header("location: /tide/auth/login.php");
    exit;
}
?>