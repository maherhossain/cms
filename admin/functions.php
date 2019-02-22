<?php
include "../inc/db.php";

function confirmQuery($result){
  global $conn;
    if(!$result){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Query Execution Failed!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>". mysqli_error($conn);
    }
}

function add_category(){
	global $conn;
	// Insert category to database
    if(isset($_POST['category_submit'])){
        $category_name = $_POST['category'];
        
        if(!empty($category_name)){
            $sql = "INSERT INTO categories(name) VALUES('$category_name')";
            $execute = mysqli_query($conn, $sql);
            if($execute){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Category Inserted Successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }else{
                echo "Insertion Failed". mysqli_error($conn);
            }
        }else{
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>The field can't be empty<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }

}


function show_all_categories(){
	global $conn;
	//Show all category
    $sql = "SELECT * FROM categories";
    $fetchData = mysqli_query($conn, $sql);

    while($result = mysqli_fetch_assoc($fetchData)){
      $id = $result['id'];
      $row = $result['name'];
      echo "<tr>";
      echo "<th scope='row'>$id</th>";
      echo "<td>$row</td>";
      echo "<td><a class='btn btn-danger p-0 p-1 px-2' href='category.php?edit={$id}'>EDIT</a></td>";
      echo "<td><a class='btn btn-danger p-0 p-1 px-2' href='category.php?delete={$id}'>DELETE</a></td>";
      echo "</tr>";
    }

}

function delete_category(){
	global $conn;
	//delete category
	 if(isset($_GET['delete'])){
	      $deleteItem = $_GET['delete'];
	      $sql = "DELETE from categories WHERE id=$deleteItem ";
	      $execute = mysqli_query($conn, $sql);

	      if($execute){
	        header('Location: category.php');
	    //    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Category Deleted Successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	        }else{
	        echo "Fail to Delete the Category". mysqli_error($conn);
	    }
	}
}


// function create_post(){
//   global $conn;
//   if(isset($_POST['submit'])){
//     $title    = $_POST['postTitle'];
//     $category = $_POST['postCategory'];
//     $author   = $_POST['author'];
//     $status   = $_POST['status'];
//     $tags     = $_POST['tags'];
//     $content  = $_POST['postContent'];

//     $postImage        = $_FILES['postImage']['name'];
//     $postImageTemp    = $_FILES['postImage']['tmp_name'];

//     $postDate         = date('d-m-y');
//     $postCommentCount = 4;

//     move_uploaded_file($postImageTemp, "../images/$postImage");


//     $sql = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES('$category', '$title', '$author', now(), '$postImage', '$content', '$tags', '$postCommentCount', '$status')";

//     $execute = mysqli_query($conn, $sql);
//     if($execute){
//       echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Post Insertion Successfully!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
//     }else{
//       echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Post Insertion Failed!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>" . mysqli_error($conn);
//     }
//   }

//}