<div class="card">
  <div class="card-body">
    <form action="" method="post">
        <div class="form-group">
          <label for="category">Edit Category</label>

          <?php
          if(isset($_GET['edit'])){
                  $edit_id = $_GET['edit'];
                  $sql = "SELECT * FROM categories WHERE id='$edit_id'";
                  $fetchData = mysqli_query($conn, $sql);
                  
              while($result = mysqli_fetch_assoc($fetchData)){
                $name = $result['name'];
                $id = $result['id'];
                ?>
              <input type="text" class="form-control" id="category" name="category" value="<?php if(isset($name)){echo $name;} ?>">
          <?php } }?>

          <?php 
            if(isset($_POST['update'])){
              $name = $_POST['category'];
              $sql = "UPDATE categories SET name = '$name' WHERE id=$edit_id";
              $execute = mysqli_query($conn, $sql);

              if(!$execute){
                echo "not Updated";
              }else{
                header('Location: category.php');
              }
            }
            ?>

        </div>
        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
      </form>
  </div>
</div>