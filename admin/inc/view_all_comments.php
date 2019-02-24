<div class="table-responsive">
	<table class="table table-striped table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Author</th>
	      <th scope="col">Comment</th>
	      <th scope="col">Email</th>
	      <th scope="col">Status</th>
	      <th scope="col">In Response to</th>
	      <th scope="col">Date</th>
	      <th scope="col">Approve</th>
	      <th scope="col">Unapproved</th>
	      <th scope="col" class="text-center">Action</th>
	    </tr>
	  </thead>
	  <tbody>
<?php 
    $sql = "SELECT * FROM comments";
    $fetchData = mysqli_query($conn, $sql);

    while($result = mysqli_fetch_assoc($fetchData)){
      $comment_id 				= $result['comment_id'];
      $comment_author 			= $result['comment_author'];
      $comment_email 			= $result['comment_email'];
      $comment_content 	        = substr($result['comment_content'],0,14);
      $comment_status 			= $result['comment_status'];
      $comment_post_id 	        = $result['comment_post_id'];
      $comment_date 			= $result['comment_date'];

      echo "<tr>";
      echo "<th scope='row'>{$comment_id}</th>";
      echo "<td>{$comment_author}</td>";
      echo "<td>{$comment_content}</td>";
      echo "<td>{$comment_email}</td>";
      echo "<td>{$comment_status}</td>";
    $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['post_id'];
        $title = $row['post_title'];
        echo "<td><a href='../post.php?id=$id'>{$title}</a></td>";
    }
echo "<td>{$comment_date}</td>";
echo "<td><a href='comments.php?approved=$comment_id' class='text-primary'>Approve</a></td>";
echo "<td><a href='comments.php?unapproved=$comment_id' class='text-primary'>Unapprove</a></td>";
echo "<td><a href='comments.php?delete=$comment_id' class='text-danger'>Delete</a></td>";
      echo "</tr>";
	  }
?>
  		</tbody>
	</table>
</div>
<?php
//delete comments
	if(isset($_GET['delete'])){
		$delete_id = $_GET['delete'];

		$sql = "DELETE FROM comments WHERE comment_id=$delete_id";

		$execute = mysqli_query($conn, $sql);
		//confirmQuery($execute);
		header("location: comments.php");
	}

//Update
if(isset($_GET['unapproved'])){
		$comment_id = $_GET['unapproved'];

		$sql = "UPDATE comments SET comment_status='unapproved' WHERE comment_id=$comment_id";

		$execute = mysqli_query($conn, $sql);
		//confirmQuery($execute);
		header("location: comments.php");
	}
//Update
if(isset($_GET['approved'])){
		$comment_id = $_GET['approved'];
		$sql = "UPDATE comments SET comment_status='approved' WHERE comment_id=$comment_id";
		$execute = mysqli_query($conn, $sql);
		//confirmQuery($execute);
		header("location: comments.php");
	}

?>