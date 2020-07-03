<?php
session_start(); 
if($_SESSION['login']!="admin" && $_SESSION['login']!="superadmin")
{
	header("Location:/login.php"); 
	exit();
}
?>