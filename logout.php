<?php session_start();
unset($_SESSION['ez_username']);
session_destroy();

header("Location: index.php");
?>