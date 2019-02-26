<?php 

  if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
  }
    $sql = "SELECT * FROM posts WHERE post_id='$post_id'";
    $fetchData = mysqli_query($conn, $sql);

    while($result = mysqli_fetch_assoc($fetchData)){
      $post_id            = $result['post_id'];
      $post_author        = $result['post_author'];
      $post_title         = $result['post_title'];
      $post_category_id   = $result['post_category_id'];
      $post_status        = $result['post_status'];
      $post_image         = $result['post_image'];
      $post_tags          = $result['post_tags'];
      $post_comment_count = $result['post_comment_count'];
      $post_date          = $result['post_date'];
      $post_content       = $result['post_content'];

}

if(isset($_POST['update'])){

    $title    = $_POST['postTitle'];
    $category = $_POST['postCategory'];
    $author   = $_POST['author'];
    $status   = $_POST['status'];
    $tags     = $_POST['tags'];
    $content  = $_POST['postContent'];
    $postImage      = $_FILES['postImage']['name'];
    $postImageTemp    = $_FILES['postImage']['tmp_name'];
    move_uploaded_file($postImageTemp, "../images/$postImage");

    if(empty($postImage)){
      $sql = "SELECT post_image FROM posts WHERE post_id= $post_id";
      $fetchData = mysqli_query($conn, $sql);   
          while($result = mysqli_fetch_assoc($fetchData)){
            $postImage = $result['post_image'];
          }
    }


    $sql = "UPDATE posts SET post_category_id='$category', post_title='$title', post_author='$author', post_date=now(), post_image = '$postImage', post_content='$content', post_tags='$tags', post_status='$status' WHERE post_id=$post_id";

    $execute = mysqli_query($conn, $sql);
    if($execute){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Post Updated Successfully!!<a class='mx-2 text-danger' href='../post.php?id=$post_id'>View post</a>|<a class='mx-2 text-secondary' href='posts.php'>View All post</a><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }else{
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Post Update Failed!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>" . mysqli_error($conn);
    }
    // confirmQuery($execute);
    // header("location: posts.php");
}
?>


<div class="container mb-5">
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="postTitle">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" name="postTitle" class="form-control" id="postTitle" placeholder="Post Title">
  </div>
  <div class="form-group">
    <label for="postCategory">Post Category</label>
    <select class="form-control" name="postCategory" id="postCategory">
      <?php 
          $sql = "SELECT * FROM categories";
          $fetchData = mysqli_query($conn, $sql);
              
          while($result = mysqli_fetch_assoc($fetchData)){
            $name = $result['name'];
            $id = $result['id'];
            $selected = ($post_category_id == $id)? 'selected' : '';
            echo "<option value='$id' $selected>$name</option>";
          }
      ?>

    </select>
  </div>
  <div class="form-group">
    <label for="author">Author Name</label>
    <input value="<?php echo $post_author; ?>" type="text" name="author" class="form-control" id="author" placeholder="Author">
  </div>


  <div class="form-group">
    <label for="status">Post Status</label>
    <select name="status" id="status" class="form-control">
      <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
      <?php
        if($post_status == 'published'){
          echo '<option value="draft">Draft</option>';
        }else{
          echo '<option value="published">Published</option>';
        }
      ?>
    </select>

    
    <!-- <input value="<?php echo $post_status; ?>" type="text" name="status" class="form-control" id="status" placeholder="Post Status"> -->
  </div>


  <div class="form-group">
    <label for="postImage">Upload Image</label>
    <p><img src="../images/<?php echo $post_image; ?>" alt="image" width="100"></p>
    <input type="file" class="form-control-file" name="postImage" id="postImage">
  </div>
  <div class="form-group">
    <label for="tags">Post Tags</label>
    <input value="<?php echo $post_tags; ?>" type="text" name="tags" class="form-control" id="tags" placeholder="Post Tags">
  </div>
  <div class="form-group">
    <label for="postContent">Post Details</label>
    <textarea class="form-control" id="postContent" name="postContent" rows="8"><?php echo $post_content; ?>
    </textarea>
  </div>

  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</div>