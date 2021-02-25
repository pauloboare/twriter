<?php
@session_start();
if((!isset($_SESSION['user-checked']) == true) and (!isset ($_SESSION['password-checked']) == true)) {
	unset ($_SESSION['id-user']);
	unset($_SESSION['user-checked']);
	unset($_SESSION['password-checked']);
	header('location:login.php');
}
?>