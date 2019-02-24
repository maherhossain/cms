<?php 
//create_post(); 
if(isset($_GET['user_id'])){
  $user_id = $_GET['user_id'];

  $query = "SELECT * FROM users WHERE user_id=$user_id";
  $fetchData = mysqli_query($conn, $query);

    while($result = mysqli_fetch_assoc($fetchData)){
      $user_id        = $result['user_id'];
      $user_name      = $result['username'];
      $user_first_name    = $result['user_first_name'];
      $user_last_name     = $result['user_last_name'];
      $user_password    = $result['user_password'];
      $user_email       = $result['user_email'];
      $user_image       = $result['user_image'];
      $user_role      = $result['user_role'];
}

}


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


    $sql = "UPDATE users  SET username = '$username', user_password = '$password', user_first_name = '$fname', user_last_name = '$lname', user_email='$email', user_image='$userImage', user_role= '$role' WHERE user_id=$user_id";

    $execute = mysqli_query($conn, $sql);
    if($execute){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>USer Updated Successfully!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }else{
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>User Insertion Failed!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>" . mysqli_error($conn);
    }
  }

?>

<div class="container mb-5">
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
    <label for="password">Username</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $password; ?>">
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