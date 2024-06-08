<?php
include 'index.php';
include 'config.php';
$id = $_GET['idNo'];
//$id = $_GET['idNo'];

$fetch_data ="SELECT * FROM user WHERE Id='$id'";
$fetch_data_run =mysqli_query($connect, $fetch_data);
if(mysqli_num_rows($fetch_data_run)>0){
    foreach($fetch_data_run as $row)
    {
       ?>
       <div class="container mt-5">
    <h3 class="text-center">Edit User</h3>
<form action="update-user.php" method="POST">
  <div class="form-group mt2">
    <label for="first name">First Name</label>
    <input type="text" class="form-control" value="<?php echo $row['first_name'];?>" name="first_name" placeholder="First name">
    
</div>
<div class="form-group mt-4">
    <label for="lat name">Last Name</label>
    <input type="text"  class="form-control"value="<?php echo $row['last_name'];?>" name="last_name" placeholder="Last name">
</div>
<div class="form-group mt-4">
    <label for="user name">User Name</label>
    <input type="text" class="form-control"value="<?php echo $row['user_name'];?>"  name="user_name" placeholder="user name">
</div>
<div class="form-group mt-4">
    <label for="password">Password</label>
    <input type="password" class="form-control"value="<?php echo $row['password'];?>"  name="password" placeholder="Password">
</div>
<div class="form-group mt-4">
    <label>Role</label>
    <select class="form-select" name="role"aria-label="Default select example">
        <option selected>select Role</option>
        <option value="<?php echo ($role == '1') ? 'selected' : ''; ?>" >Admin</option>
        <option value="<?php echo ($role == '2') ? 'selected' : ''; ?>" >Editor</option>
    </select>
</div>

<div class="mt-4">
    <button name="edit" class="btn btn-primary">Edit</button>
</div>
</form>
</div>
       <?php 
      
    }
}
else{
    echo"no record found";
}

 ?>

