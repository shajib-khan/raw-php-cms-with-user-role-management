<?php
include'index.php';
include 'config.php';
$id = $_GET['idNo'];
// Update data
if (isset($_POST['edit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hidden_id = $_POST['hidden_id'];

    $update_query = "UPDATE user SET first_name='$first_name', last_name='$last_name', user_name='$user_name', password='$password', role='$role' WHERE Id=$hidden_id"; 
    $update_query_run = mysqli_query($connect, $update_query);
    
    if ($update_query_run) {
        header("location:user.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Fetch data
$fetch_data = "SELECT * FROM user WHERE Id='$id'";
$fetch_data_run = mysqli_query($connect, $fetch_data);
if (mysqli_num_rows($fetch_data_run) > 0) {
    foreach ($fetch_data_run as $row) {
       ?>
       <div class="container mt-5">
           <h3 class="text-center">Edit User</h3>
           <form action="update-user.php" method="POST">
               <div class="form-group mt2">
                   <label for="first_name">First Name</label>
                   <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>" name="first_name" placeholder="First name" required>
               </div>
               <div class="form-group mt-4">
                   <label for="last_name">Last Name</label>
                   <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>" name="last_name" placeholder="Last name" required>
               </div>
               <div class="form-group mt-4">
                   <label for="user_name">User Name</label>
                   <input type="text" class="form-control" value="<?php echo $row['user_name']; ?>" name="user_name" placeholder="User name" required>
               </div>
               <div class="form-group mt-4">
                   <label for="password">Password</label>
                   <input type="password" class="form-control" value="<?php echo $row['password']; ?>" name="password" placeholder="Password" required>
               </div>
               <div class="form-group mt-4">
                   <label>Role</label>
                   <select class="form-select" name="role" aria-label="Default select example" required>
                       <option value="" disabled>Select Role</option>
                       <option value="1" <?php echo ($row['role'] == '1') ? 'selected' : ''; ?>>Admin</option>
                       <option value="2" <?php echo ($row['role'] == '2') ? 'selected' : ''; ?>>Editor</option>
                   </select>
               </div>
               <input type="hidden" name="hidden_id" value="<?php echo $row['Id']; ?>">
               <div class="mt-4">
                   <button name="edit" class="btn btn-primary">Edit</button>
               </div>
           </form>
       </div>
       <?php 
    }
} else {
    echo "No record found";
}
?>
