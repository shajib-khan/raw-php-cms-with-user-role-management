<?php
include 'index.php';
include 'config.php';

$id = $_GET['idNo'];

// Update data
if (isset($_POST['editCategory'])) {
    $category_name = $_POST['category_name'];
    $hidden_id = $_POST['hidden_id'];

    $update_query = "UPDATE category SET category_name='$category_name' WHERE Id=$hidden_id"; 
    $update_query_run = mysqli_query($connect, $update_query);
    
    if ($update_query_run) {
        header("location:category.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Fetch data
$fetch_data = "SELECT * FROM category WHERE Id='$id'";
$fetch_data_run = mysqli_query($connect, $fetch_data);



if (mysqli_num_rows($fetch_data_run) > 0) {
    foreach ($fetch_data_run as $row) {
       ?>
       <div class="container mt-5">
           <h3 class="text-center">Edit Category</h3>
           <form action="update-category.php" method="POST">
               <div class="form-group mt2">
                   <label>First Name</label>
                   <input type="text" class="form-control" value="<?php echo $row['category_name']; ?>" name="category_name" placeholder="category name" required>
               </div>
               <input type="hidden" name="hidden_id" value="<?php echo $row['Id']; ?>">
               <div class="mt-4">
                   <button name="editCategory" class="btn btn-primary">Edit</button>
               </div>
           </form>
       </div>
       <?php 
    }
}
?>
