<?php
	include('db_connect.php');
	session_start();
	
	if(isset($_SESSION['login_username']))
	{
		$_SESSION['admin-logout']="Admin logged out";
		unset($_SESSION['login_username']);
		header('Location:admin.php');
	}

?>