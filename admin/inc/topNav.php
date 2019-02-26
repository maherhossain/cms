<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top zi-1">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-dark ml-5">
            <i class="fas fa-align-left"></i>
        </button>

        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php"><i class="fas fa-home pr-1"></i> HOME</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link pt-3" href="#"><i class="fas fa-sign-out-alt"></i>Maher Hossain</a>
                </li> --><!-- 
                <li class="nav-item">
                    <img src="../images/profile.jpg" height="50" width="50" class="d-block mx-auto img-fluid rounded-circle" alt="">
                </li> -->
                <li class="nav-item dropdown mr-5">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user pr-1"></i> Maher Hossain <i class="fas fa-angle-down pl-1"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../inc/logout.php"><i class="fas fa-sign-out-alt pr-1"></i>Logout</a>
                      <a class="dropdown-item" href="#">Another </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>