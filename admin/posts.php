<?php include "inc/header.php"; ?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include "inc/sideNav.php"?>
        <!-- Page Content  -->
        <div id="content">
            <?php include "inc/topNav.php" ?>
        
        <div class="container mt-5 mt-100">
	        <div class="row">
	            <div class="col-md-12">
<?php
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	}else{
		$source = '';
	}

	switch($source){
		case 'add_post':
			include "inc/add_post.php";
			break;

		case 'edit_post':
			include "inc/edit_post.php";
			break;

		case '12':
			echo "12";
			break;

		default:
			include "inc/view_all_posts.php";
			break;
	}



?>



				</div>
	        </div>
        </div>
        
    </div>
<?php include "inc/footer.php"; ?>


