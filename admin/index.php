<?php include "inc/header.php"; ?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include "inc/sideNav.php"?>
        
        

        <!-- Page Content  -->
        <div id="content">
            
            <?php include "inc/topNav.php" ?>
            <div class="container-fluid mt-5 mt-100">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="text-center">Welcome <?php echo strtoupper($_SESSION['user']); ?></h2>
                    </div>
                </div>

<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4 p-3">
              <i class="fas fa-book-open fa-5x text-primary"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body text-right">
                <?php
                    $query ="SELECT * FROM posts";
                    $result = mysqli_query($conn, $query);
                    $post_count = mysqli_num_rows($result);
                ?>
                <h5 class="card-title"><?php echo $post_count; ?></h5>
                <p class="card-text">Posts</p>
              </div>
            </div>
          </div>
            <a href="posts.php">
                <div class="card-footer p-1">
                    <p class="text-center p-1 m-1">View Details <i class="fa fa-arrow-circle-right"></i></p>
                </div>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-md-6">
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4 p-3">
              <i class="fa fa-comments fa-5x text-success"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body text-right">
                <?php
                    $query ="SELECT * FROM comments";
                    $result = mysqli_query($conn, $query);
                    $comment_count = mysqli_num_rows($result);
                ?>
                <h5 class="card-title"><?php echo $comment_count; ?></h5>
                <p class="card-text">Comments</p>
              </div>
            </div>
          </div>
            <a href="Comments.php">
                <div class="card-footer p-1">
                    <p class="text-center p-1 m-1">View Details <i class="fa fa-arrow-circle-right"></i></p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4 p-3">
              <i class="fa fa-user fa-5x text-info"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body text-right">
                <?php
                    $query ="SELECT * FROM users";
                    $result = mysqli_query($conn, $query);
                    $user_count = mysqli_num_rows($result);
                ?>
                <h5 class="card-title"><?php echo $user_count; ?></h5>
                <p class="card-text">Users</p>
              </div>
            </div>
          </div>
            <a href="users.php">
                <div class="card-footer p-1">
                    <p class="text-center p-1 m-1">View Details <i class="fa fa-arrow-circle-right"></i></p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4 p-3">
              <i class="fa fa-list fa-5x text-danger"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body text-right">
                <?php
                    $query ="SELECT * FROM categories";
                    $result = mysqli_query($conn, $query);
                    $category_count = mysqli_num_rows($result)
                ?>
                <h5 class="card-title"><?php echo $category_count; ?></h5>
                <p class="card-text">Categories</p>
              </div>
            </div>
          </div>
            <a href="category.php">
                <div class="card-footer p-1">
                    <p class="text-center p-1 m-1">View Details <i class="fa fa-arrow-circle-right"></i></p>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">

<?php
    
$query = "SELECT * FROM posts WHERE post_status = 'published'";
$select_all_published = mysqli_query($conn, $query);
$published_post_count = mysqli_num_rows($select_all_published);

$query = "SELECT * FROM posts WHERE post_status = 'draft'";
$select_all_draft = mysqli_query($conn, $query);
$draft_post_count = mysqli_num_rows($select_all_draft);

$query ="SELECT * FROM comments WHERE comment_status='unapproved'";
$select_unapprove_comment = mysqli_query($conn, $query);
$unapproved_comment_count = mysqli_num_rows($select_unapprove_comment);


$query ="SELECT * FROM users WHERE user_role='subscriber'";
$select_subscriber = mysqli_query($conn, $query);
$subscriber_count = mysqli_num_rows($select_subscriber)




?>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Data', 'Count'],
        <?php
            $element_text = ['All Posts', 'Active posts', 'Draft Posts' ,'Comments Count', 'Unapproved', 'Users Count', 'Subscriber','Category'];
            $element_count = [ $post_count, $published_post_count, $draft_post_count, $comment_count, $unapproved_comment_count, $user_count, $subscriber_count,$category_count]; 

            for($i = 0; $i<8; $i++){
                echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
            }
        ?>
          // ['Post', 1000],
    ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<div class="col-md-12">
    <div class="card my-5">
        <div class="card-body">
            <div id="columnchart_material" class="w-100 p-5" style="min-height: 450px">
            </div>
        </div>
    </div>
</div>

</div>  
         


<!-- <div class="row">
    
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<div class="col-md-12">
    <div class="card my-5">
        <div class="card-body">
            <div id="piechart" class="w-100 p-2" style="min-height: 550px"></div>
        </div>
    </div>
</div>


</div> -->











    </div>
</div>

<?php include "inc/footer.php"; ?>