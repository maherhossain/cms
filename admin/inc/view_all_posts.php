<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Author</th>
	      <th scope="col">Title</th>
	      <th scope="col">Category</th>
	      <th scope="col">Status</th>
	      <th scope="col">Image</th>
	      <th scope="col">Tags</th>
	      <th scope="col">Comments</th>
	      <th scope="col">Date</th>
	      <th scope="col" colspan="2" class="text-center">Action</th>
	    </tr>
	  </thead>
	  <tbody>
<?php 
    $sql = "SELECT * FROM posts";
    $fetchData = mysqli_query($conn, $sql);

    while($result = mysqli_fetch_assoc($fetchData)){
      $post_id 				= $result['post_id'];
      $post_author 			= $result['post_author'];
      $post_title 			= $result['post_title'];
      $post_category_id 	= $result['post_category_id'];
      $post_status 			= $result['post_status'];
      $post_image 			= $result['post_image'];
      $post_tags 			= $result['post_tags'];
      $post_comment_count 	= $result['post_comment_count'];
      $post_date 			= $result['post_date'];

	      echo "<tr>";
	      echo "<th scope='row'>{$post_id}</th>";
	      echo "<td>{$post_author}</td>";
	      echo "<td>{$post_title}</td>";

	    $sql1 = "SELECT * FROM categories WHERE id=$post_category_id";
	    $fetchData1 = mysqli_query($conn, $sql1);
        while($result = mysqli_fetch_assoc($fetchData1)){
            $name = $result['name'];
            $id = $result['id'];

            echo "<td>{$name}</td>";
        }
	      
	      echo "<td>{$post_status}</td>";
	      echo "<td><img width='100' class='img-fluid' src='../images/{$post_image}'></td>";
	      echo "<td>{$post_tags}</td>";
        
        
	      echo "<td>{$post_comment_count}</td>";
        
        
        
	      echo "<td>{$post_date}</td>";
	      echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}' class='btn btn-primary p-0 py-1 px-2'>Edit</a></td>";
	      echo "<td><a href='posts.php?delete={$post_id}' class='btn btn-danger p-0 py-1 px-2'>Delete</a></td>";
	      echo "</tr>";
	  }
?>
  		</tbody>
	</table>
</div>
<?php
	if(isset($_GET['delete'])){
		$delete_id = $_GET['delete'];

		$sql = "DELETE FROM posts WHERE post_id=$delete_id";

		$execute = mysqli_query($conn, $sql);
		//confirmQuery($execute);
		header("location: posts.php");
	}

?>