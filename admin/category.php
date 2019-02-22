<?php include "inc/header.php"; ?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include "inc/sideNav.php"?>
        <!-- Page Content  -->
        <div id="content">
            <?php include "inc/topNav.php" ?>
        
        <div class="container mt-5 mt-100">
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                      <!-- Insert Category-->
                      <?php add_category();?>
                        <!-- Insert Form-->
                        <form action="" method="post">
                          <div class="form-group">
                            <label for="category">Add Category</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter a category">
                          </div>
                          <button type="submit" name="category_submit" class="btn btn-primary">Add Categotry</button>
                        </form><!-- Edit Form--> 
                    </div>
                </div>

<!-- UPDATE CATEGORIES                 -->
<?php 
    if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
        include "inc/updateCategory.php";
    } 
?> 
                 
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-success">
                          <thead>
                            <tr class="text-center">
                              <th scope="col">Id</th>
                              <th scope="col">Category Name</th>
                              <th scope="col" colspan="2">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           
<?php show_all_categories();?>
                          
<?php delete_category();?>
                           
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        </div>
        
    </div>
<?php include "inc/footer.php"; ?>


