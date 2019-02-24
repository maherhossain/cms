<div class="table-responsive">
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Username</th>
	      <th scope="col">Image</th>
	      <th scope="col">First Name</th>
	      <th scope="col">Last Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Role</th>
	      <th scope="col" colspan="4" class="text-center">Action</th>
	    </tr>
	  </thead>
	  <tbody>
<?php 
    $sql = "SELECT * FROM users";
    $fetchData = mysqli_query($conn, $sql);

    while($result = mysqli_fetch_assoc($fetchData)){
      $user_id 				= $result['user_id'];
      $user_name 			= $result['username'];
      $user_first_name 		= $result['user_first_name'];
      $user_last_name 		= $result['user_last_name'];
      $user_password 		= $result['user_password'];
      $user_email 			= $result['user_email'];
      $user_image 			= $result['user_image'];
      $user_role 			= $result['user_role'];

	      echo "<tr>";
	      echo "<th scope='row'>{$user_id}</th>";
	      echo "<td>{$user_name}</td>";
	      echo "<td><img src='../images/{$user_image}' width='50' height='50' class='img-fluid rounded-circle'></td>";
	      echo "<td>{$user_first_name}</td>";
	      echo "<td>{$user_last_name}</td>";
	      echo "<td>{$user_email}</td>";
	      echo "<td>{$user_role}</td>";
echo "<td><a href='users.php?admin=$user_id' class='text-primary'>Admin</a></td>";
echo "<td><a href='users.php?subscriber=$user_id' class='text-primary'>Subscriber</a></td>";
echo "<td><a href='users.php?source=edit_user&user_id={$user_id}' class='text-primary'>Edit</a></td>";
echo "<td><a href='users.php?delete=$user_id' class='text-danger'>Delete</a></td>";
	      echo "</tr>";
	  }
?>
  		</tbody>
	</table>
</div>
<?php
	if(isset($_GET['delete'])){
		$delete_id = $_GET['delete'];

		$sql = "DELETE FROM users WHERE user_id=$delete_id";

		$execute = mysqli_query($conn, $sql);
		//confirmQuery($execute);
		header("location: users.php");
	}

//Update
if(isset($_GET['admin'])){
		$user_id = $_GET['admin'];
		$sql = "UPDATE users SET user_role='admin' WHERE user_id=$user_id";
		$execute = mysqli_query($conn, $sql);
		//confirmQuery($execute);
		header("location: users.php");
	}
//Update
if(isset($_GET['subscriber'])){
		$user_id = $_GET['subscriber'];
		$sql = "UPDATE users SET user_role='subscriber' WHERE user_id=$user_id";
		$execute = mysqli_query($conn, $sql);
		//confirmQuery($execute);
		header("location: users.php");
	}

?>