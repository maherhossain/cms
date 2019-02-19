  <nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav mr-auto">
        <?php
            $sql = "SELECT * FROM categories";
            $fetchData = mysqli_query($conn, $sql);

            while($result = mysqli_fetch_assoc($fetchData)){
              $row = $result['name'];
              echo "<li class='nav-item'><a class='nav-link' href='#'>$row</a></li>";
            }
        ?>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-lock"></i> &nbsp;Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
      </ul>

    </div>
  </div>
  </nav>