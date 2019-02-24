<?php include "db.php";


if(isset($_POST['login'])){
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$user_email = mysqli_real_escape_string($conn, $email);
	$user_pass = mysqli_real_escape_string($conn, $pass);

}





?>