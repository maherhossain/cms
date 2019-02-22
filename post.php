<?php 
include "inc/db.php";
include "inc/header.php";
include "inc/nav.php"; 
?>



    <!-- Page Content -->
    <div class="container mt-5">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 mt-4">

                <h1 class="page-header">
                    Page Heading<small>Secondary Text</small>
                </h1>

            <?php 
            if(isset($_GET["id"])){
            	$id = $_GET["id"];
            }
            	
                $sql = "SELECT * FROM posts WHERE post_id=$id";
                $fetchData = mysqli_query($conn, $sql);

                while($result = mysqli_fetch_assoc($fetchData)){
                  $title = $result['post_title'];
                  $author = $result['post_author'];
                  $date = $result['post_date'];
                  $image = $result['post_image'];
                  $content = $result['post_content'];
            ?>
            <div class="card p-4 my-3">
                <div class="card-body">
                    <h2>
                        <a href="#"><?php echo $title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $author; ?></a>
                    </p>
                    <p><i class="far fa-clock"></i></span><?php echo $date; ?></p>
                    
                    <img class="img-fluid my-3" src="images/<?php echo $image; ?>" alt="">
                    
                    <p><?php echo $content; ?></p>
                    <hr>
                </div>
            </div>

            <?php  } ?>


<h2 class="border p-3 bg-info">Comment</h2>

<div class="media mb-2 border" >
  <img src="images/profile.jpg" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0">Media heading</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
  </div>
</div>
<div class="media border">
  <img src="images/profile.jpg" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0">Media heading</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

    <div class="media mt-3">
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



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "inc/sidebar.php"; ?>

        </div>
        <!-- /.row -->

<?php include "inc/footer.php"; ?>
