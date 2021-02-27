<?php
if (!isset($_SESSION)) { 
	session_start(); 
}

if((!isset($_SESSION['user-checked']) === TRUE ) and (!isset($_SESSION['password-checked']) === TRUE)) {
	unset ($_SESSION['id-user']);
	unset ($_SESSION['name']);
	unset($_SESSION['user-checked']);
	unset($_SESSION['password-checked']);
	header('Location:login.php');
}

?>