<?php
include 'index.php';
include 'config.php';
//$id = $_GET['idNo'];
$id = intval($_GET['idNo']);
$read = "SELECT * FROM user WHERE Id=$id";
$query = mysqli_query($connect,$read);
$row = mysqli_query($connect,$read);
if(isset($_POST['edit'])){
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $user_name= $_POST['user_name'];
    $password= $_POST['password'];
    $role= $_POST['role'];

    $update="UPDATE user SET 
    first_name='$first_name', last_name='$last_name',user_name='$user_name',password='$password', role='$role'
    where Id =$id";
    $query = mysqli_query($connect,$update);
    if($query){
        echo"<script>alert('data send success')</script>";
    }else{
        echo"<script>alert('data edit failed')</script>";
    }

}
 ?>

<div class="container mt-5">
    <h3 class="text-center">Edit User</h3>
<form action="update-user.php" method="POST">
  <div class="form-group mt2">
    <label for="first name">First Name</label>
    <input type="text" class="form-control" name="first_name" placeholder="First name">
    
</div>
<div class="form-group mt-4">
    <label for="lat name">Last Name</label>
    <input type="text" class="form-control" name="last_name" placeholder="Last name">
</div>
<div class="form-group mt-4">
    <label for="user name">User Name</label>
    <input type="text" class="form-control"name="user_name" placeholder="user name">
</div>
<div class="form-group mt-4">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
</div>
<div class="form-group mt-4">
    <label>Role</label>
    <select class="form-select" name="role"aria-label="Default select example">
        <option selected>select Role</option>
        <option value="1">admin</option>
        <option value="2">editor</option>
    </select>
</div>

<div class="mt-4">
    <button name="edit" class="btn btn-primary">Edit</button>
</div>
</form>
</div>