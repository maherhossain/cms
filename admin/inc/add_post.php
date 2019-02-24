<?php 
//create_post(); 


if(isset($_POST['submit'])){
    $title    = $_POST['postTitle'];
    $category = $_POST['postCategory'];
    $author   = $_POST['author'];
    $status   = $_POST['status'];
    $tags     = $_POST['tags'];
    $content  = $_POST['postContent'];

    $postImage        = $_FILES['postImage']['name'];
    $postImageTemp    = $_FILES['postImage']['tmp_name'];

    $postDate         = date('d-m-y');
    // $postCommentCount = 4;

    move_uploaded_file($postImageTemp, "../images/$postImage");


    $sql = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES( $category, '$title', '$author', now(), '$postImage', '$content', '$tags', '$status')";

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
  <div class="form-group">
    <label for="postTitle">Post Title</label>
    <input type="text" name="postTitle" class="form-control" id="postTitle" placeholder="Post Title">
  </div>
  <div class="form-group">
    <label for="postCategory">Post Category</label>
	<select class="form-control" name="postCategory" id="postCategory">
	<?php 
	$sql1 = "SELECT * FROM categories";
	    $fetchData1 = mysqli_query($conn, $sql1);
        while($result = mysqli_fetch_assoc($fetchData1)){
            $name 	= $result['name'];
            $id 	= $result['id'];
            echo "<option value='{$id}'>{$name}</option>";
        }
    ?>
    </select>
    <!-- <input type="text" name="postCategory" class="form-control" id="postCategory" placeholder="Post Category"> -->
  </div>
  <div class="form-group">
    <label for="author">Author Name</label>
    <input type="text" name="author" class="form-control" id="author" placeholder="Author">
  </div>
  <div class="form-group">
    <label for="status">Post Status</label>
    <input type="text" name="status" class="form-control" id="status" placeholder="Post Status">
  </div>
  <div class="form-group">
    <label for="postImage">Upload Image</label>
    <input type="file" class="form-control-file" name="postImage" id="postImage">
  </div>
  <div class="form-group">
    <label for="tags">Post Tags</label>
    <input type="text" name="tags" class="form-control" id="tags" placeholder="Post Tags">
  </div>
  <div class="form-group">
    <label for="postContent">Post Details</label>
    <textarea class="form-control" id="postContent" name="postContent" rows="8"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>