<?php
include 'index.php';
include 'config.php';

$id = $_GET['idNo'];

// Update data
if (isset($_POST['editPost'])) {
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $hidden_id = $_POST['hidden_id'];

    $update_query = "UPDATE post SET post_title='$post_title',post_description='$post_description' WHERE Id=$hidden_id"; 
    $update_query_run = mysqli_query($connect, $update_query);
    
    if ($update_query_run) {
        header("location:post.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Fetch data
$fetch_data = "SELECT * FROM post WHERE Id='$id'";
$fetch_data_run = mysqli_query($connect, $fetch_data);



if (mysqli_num_rows($fetch_data_run) > 0) {
    foreach ($fetch_data_run as $row) {
       ?>
       <div class="container mt-5">
           <h3 class="text-center">Edit Post</h3>
           <form action="update-post.php" method="POST">
               <div class="form-group mt2">
                   <label>Post Title</label>
                   <input type="text" class="form-control" value="<?php echo $row['post_title']; ?>" name="post_title" placeholder="Post Title" required>
               </div>
               <div class="form-group mt2">
                   <label>Post Description</label>
                   <textarea class="form-control"value="<?php echo $row['post_description']; ?>" name="post_description" placeholder="Post Description" rows="3"></textarea>
               </div>
               <input type="hidden" name="hidden_id" value="<?php echo $row['Id']; ?>">
               <div class="mt-4">
                   <button name="editPost" class="btn btn-primary">Edit</button>
               </div>
           </form>
       </div>
       <?php 
    }
}
?>
