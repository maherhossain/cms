<?php 
include "inc/db.php";
include "inc/header.php";
include "inc/nav.php"; 
?>



<!-- Page Content -->
<div class="container mt-5">

<div class="row">
    <div class="col-md-8 mt-4">

    <?php 
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }

        $sql = "SELECT * FROM posts WHERE post_id=$id";
        $fetchData = mysqli_query($conn, $sql);

        while($result = mysqli_fetch_assoc($fetchData)){
          $title    = $result['post_title'];
          $author   = $result['post_author'];
          $date     = $result['post_date'];
          $image    = $result['post_image'];
          $content  = $result['post_content'];
    ?>
    <div class="card p-4 my-3">
        <div class="card-body">
            <h2>
                <?php echo $title; ?>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $author; ?></a>
            </p>
            <p><i class="far fa-clock"></i><?php echo $date; ?></p>

            <img class="img-fluid my-3" src="images/<?php echo $image; ?>" alt="">

            <p><?php echo $content; ?></p>
            <hr>
        </div>
    </div>

    <?php  } ?>


<?php
    if(isset($_POST['submit'])){
        $id         = $_GET["id"];
        $name       = $_POST['author'];
        $email      = $_POST['email'];
        $comment    = $_POST['comment'];
        
        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES($id, '$name', '$email', '$comment','unapproved', now())";
        
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Pending for approval!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Query Execution Failed!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>". mysqli_error($conn);
        }

//update post comment count
        $comment_count_sql = "UPDATE posts SET post_comment_count = post_comment_count+1 WHERE post_id = $id";
        $result = mysqli_query($conn, $comment_count_sql);

    }            

?>
<div class="card my-4">
    <div class="card-body">
        <form action="post.php?id=<?php echo $id; ?>" method="post">
        <h3 class="text-center">Leave a Comment</h3>
        <div class="form-group">
            <label for="author">Name</label>
              <input type="text" class="form-control" name="author" id="author" placeholder="Author Name">
          </div>
        <div class="form-group">
            <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Author Email">
          </div>
          <div class="form-group">
            <label for="msg">Comment</label>
              <textarea id="msg" name="comment" class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>



<?php
    $query = "SELECT * FROM comments WHERE comment_post_id=$id AND comment_status='approved' ORDER BY comment_id DESC";
    $execute_comment_query = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_assoc($execute_comment_query)){
            $date       =$row['comment_date'];
            $content    =$row['comment_content'];
            $author     =$row['comment_author'];
?>
            
<div class="media mb-2 p-2 border" >
  <img src="images/profile.jpg" class="mr-3" alt="...">
  <div class="media-body">
    <h4 class="mt-0 d-inline text-uppercase"><?php echo $author; ?></h4>
    <span><?php echo $date; ?></span>
    <p><?php echo $content; ?></p>
  </div>
</div>
            
            
<?php } ?>






<!--
<div class="media border">
  <img src="images/profile.jpg" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0">Media heading</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

    <div class="media mt-3 border">
      <a class="mr-3" href="#">
        <img src="images/profile.jpg" class="mr-3" alt="...">
      </a>
      <div class="media-body">
        <h5 class="mt-0">Media heading</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div>
  </div>
</div>
-->



    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?php include "inc/sidebar.php"; ?>

</div>
<!-- /.row -->

<?php include "inc/footer.php"; ?>
