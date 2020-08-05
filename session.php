<?php
session_start(); 
if($_SESSION['login']!="admin" && $_SESSION['login']!="superadmin" && !(isset($needLogin) && !$needLogin))
{
	header("Location:/login.php"); 
	exit();
}
?>
