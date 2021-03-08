<?php 
session_start();
	unset ($_SESSION['id-user']);
	unset ($_SESSION['name']);
	unset($_SESSION['user-checked']);
	unset($_SESSION['password-checked']);
	header('location: login');
?>