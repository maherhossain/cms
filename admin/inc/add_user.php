<?php 
//create_post(); 


if(isset($_POST['submit'])){
    $fname        = $_POST['firstName'];
    $lname        = $_POST['lastName'];
    $email        = $_POST['email'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $role         = $_POST['role'];

    $userImage        = $_FILES['userImage']['name'];
    $userImageTemp    = $_FILES['userImage']['tmp_name'];

    move_uploaded_file($userImageTemp, "../images/$userImage");


    $sql = "INSERT INTO users(username, user_password, user_first_name, user_last_name, user_email, user_image, user_role) VALUES( '$username', '$password', '$fname', '$lname', '$email', '$userImage', '$role')";

    $execute = mysqli_query($conn, $sql);
    if($execute){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Post Insertion Successfully!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }else{
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Post Insertion Failed!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>" . mysqli_error($conn);
    }
  }

?>

<div class="container mb-5">
<form action="" method="post" enctype="multipart/form-data">

<div class="row">
    <div class="col">
      <label for="email">Name</label>
      <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name">
    </div>
    <div class="col">
      <label for="email">&nbsp;</label>
      <input type="text" name="lastName" class="form-control" id="firstName" placeholder="Last Name">
    </div>
</div>


  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Username</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="userImage">Upload Image</label>
    <input type="file" class="form-control-file" name="userImage" id="userImage">
  </div>


<div class="form-group">
    <label for="role">Role</label>
  <select class="form-control" name="role" id="role">
      <option value="subscriber">---Select user role---</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
  </select>
</div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>