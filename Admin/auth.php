<?php
session_start();

if(!isset($_SESSION["user_name"])) {
	header("Location: /WordConvert/Admin/login.php");
	exit;
}
?>