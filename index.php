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
                $sql = "SELECT * FROM posts";
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
                    <a class="btn btn-primary" href="#">
                        Read More <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>

            <?php  } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "inc/sidebar.php"; ?>

        </div>
        <!-- /.row -->

<?php include "inc/footer.php"; ?>
