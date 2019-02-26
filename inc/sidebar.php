<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="card card-body mt-5 mb-3">
        <h4>Blog Search</h4>
        <form action="search.php" method="get">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <!-- Blog Search Well -->
    <div class="card card-body my-3">
        <h4>Login</h4>
        <form action="inc/login.php" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <!-- /.input-group -->
    </div>




    <!-- Blog Categories  -->
    <div class="card card-body my-3">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-group">
                    <?php
                        $sql = "SELECT * FROM categories ORDER BY id ASC LIMIT 5";
                        $fetchData = mysqli_query($conn, $sql);

                        while($result = mysqli_fetch_assoc($fetchData)){
                          $row = $result['name'];
                          $id = $result['id'];
                          echo "<li class='list-group-item'><a class='text-dark' href='category.php?id=$id'>$row</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="card card-body my-3">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

    <!-- Side Widget Well -->
    <div class="card my-3">
        <div class="card-body">
            <h4>Tags</h4>
            <span class="badge badge-secondary p-2 text-dark"><a href="#">PHP</a></span>
            <span class="badge badge-secondary p-2 text-dark"><a href="#">JAVA</a></span>
            <span class="badge badge-secondary p-2 text-dark"><a href="#">WEB</a></span>
        </div>
    </div>

</div>