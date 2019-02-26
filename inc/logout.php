<?php
session_start();

		$_SESSION['user'] 	= NULL;
		$_SESSION['email'] 	= NULL;
		$_SESSION['image'] 	= NULL;
		$_SESSION['fname'] 	= NULL;
		$_SESSION['lname'] 	= NULL;
		$_SESSION['role'] 	= NULL;

header("Location: ../index.php")

?>