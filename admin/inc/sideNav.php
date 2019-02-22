<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../images/profile.jpg" height="100" width="100" class="d-block mx-auto img-fluid rounded-circle p-2" alt="">
        <h3 class="text-center">Maher Hossain</h3>
        <p class="text-center">Administaator</p>
    </div>
    <ul class="list-unstyled components">
        <p><a href="index.php">DASHBOARD</a></p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Post</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="./posts.php">View all post</a>
                </li>
                <li>
                    <a href="posts.php?source=add_post">Add New Post</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="category.php">Category</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Comment</a>
        </li>
        <li>
            <a href="#">Profile</a>
        </li>
    </ul>
</nav>