<?php include "db.php";
session_start();

if(isset($_POST['login'])){
	$username 		= $_POST['username'];
	$password 		= $_POST['password'];

	echo $username = mysqli_real_escape_string($conn, $username);
	echo $password = mysqli_real_escape_string($conn, $password);


	$query = "SELECT * FROM users WHERE username='{$username}'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "error".mysqli_error($conn);
	}

	while($row = mysqli_fetch_assoc($result)){
		$id 				= $row['user_id'];
		$user_password 		= $row['user_password'];
		$user_name 			= $row['username'];
		$email 				= $row['user_email'];
		$image 				= $row['user_image'];
		$user_first_name	= $row['user_first_name'];
		$user_last_name	 	= $row['user_last_name'];
		$user_role 			= $row['user_role'];
	}
	if($username !== $user_name || $password !== $user_password){
		header("Location: ../index.php");
	}else if($username === $user_name && $password === $user_password){

		$_SESSION['user'] 		= $user_name;
		$_SESSION['email'] 		= $user_email;
		$_SESSION['image'] 		= $image;
		$_SESSION['fname'] 		= $user_first_name;
		$_SESSION['lname'] 		= $user_last_name;
		$_SESSION['role'] 		= $user_role;






		header("Location: ../admin");
	}else{
		header("Location: ../index.php");
	}

}





?>