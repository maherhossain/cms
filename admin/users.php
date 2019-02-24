<?php include "inc/header.php"; ?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include "inc/sideNav.php"?>
        <!-- Page Content  -->
        <div id="content">
            <?php include "inc/topNav.php" ?>
        
        <div class="container-fluid mt-5 mt-100">
	        <div class="row">
	            <div class="col-md-12">
<?php
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	}else{
		$source = '';
	}

	switch($source){
		case 'add_user':
			include "inc/add_user.php";
			break;

		case 'edit_user':
			include "inc/edit_user.php";
			break;

		default:
			include "inc/view_all_users.php";
			break;
	}



?>



            </div>
        </div>
    </div>

</div>
<?php include "inc/footer.php"; ?>



