<?php include "inc/header.php"; ?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include "inc/sideNav.php"?>
        <!-- Page Content  -->
        <div id="content">
            <?php include "inc/topNav.php" ?>
<?php
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		$query = "SELECT * FROM users WHERE username='{$user}'";
		$fetchData = mysqli_query($conn, $query);

	    while($result = mysqli_fetch_assoc($fetchData)){
	      $user_id            = $result['user_id'];
	      $user_name          = $result['username'];
	      $user_first_name    = $result['user_first_name'];
	      $user_last_name     = $result['user_last_name'];
	      $user_password      = $result['user_password'];
	      $user_email         = $result['user_email'];
	      $user_image         = $result['user_image'];
	      $user_role          = $result['user_role'];
		}
	}

?>


     
<div class="container-fluid mt-5 mt-100">
    <div class="row">
        <div class="col-md-12">
        	<div class="card">
        		<div class="card-body">

<?php

//updating the user

if(isset($_POST['update'])){
    $fname        = $_POST['firstName'];
    $lname        = $_POST['lastName'];
    $email        = $_POST['email'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $role         = $_POST['role'];

    $userImage        = $_FILES['userImage']['name'];
    $userImageTemp    = $_FILES['userImage']['tmp_name'];

    move_uploaded_file($userImageTemp, "../images/$userImage");

    if(empty($userImage)){
      $sql = "SELECT user_image FROM users WHERE user_id= $user_id";
      $fetchData = mysqli_query($conn, $sql);   
          while($result = mysqli_fetch_assoc($fetchData)){
            $userImage = $result['user_image'];
          }
    }


    $sql = "UPDATE users  SET username = '$username', user_password = '$password', user_first_name = '$fname', user_last_name = '$lname', user_email='$email', user_image='$userImage', user_role= '$role' WHERE user_id=$user_id";

    $execute = mysqli_query($conn, $sql);
    if($execute){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>USer Updated Successfully!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }else{
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>User Insertion Failed!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true>&times;</span></button></div>" . mysqli_error($conn);
    }
  }
?>
        			
<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col">
      <label for="email">Name</label>
      <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" value="<?php echo $user_first_name; ?>">
    </div>
    <div class="col">
      <label for="email">&nbsp;</label>
      <input type="text" name="lastName" class="form-control" id="firstName" placeholder="Last Name" value="<?php echo $user_last_name; ?>">
    </div>
</div>


  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="<?php echo $user_email; ?>">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $user_name; ?>">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $user_password; ?>">
  </div>

  <div class="form-group">
    <label for="userImage">Upload Image</label>
    <input type="file" class="form-control-file" name="userImage" id="userImage">
    <img src="../images/<?php echo $user_image; ?>"  alt="image" width="100">
  </div>


<div class="form-group">
    <label for="role">Role</label>
  <select class="form-control" name="role" id="role">
      <option value="subscriber"><?php echo $user_role; ?></option>

      <?php
        if($user_role == 'admin'){
          echo "<option value='subscriber'>Subscriber</option>";
        }else{
          echo "<option value='admin'>Admin</option>";
        }

      ?>
  </select>
</div>

  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>



        		</div>
        	</div>
    	</div>
	</div>
</div>

</div>
<?php include "inc/footer.php"; ?>



