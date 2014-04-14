<?php session_start();
	unset($_SESSION['ez_admin']);
	session_destroy($_SESSION['ez_admin']);
	header("Location: login.php");
?>