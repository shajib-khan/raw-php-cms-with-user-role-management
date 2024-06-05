<?php
include'index.php';
  $connect = mysqli_connect("localhost","root","","php_blog");
if(isset($_POST['submit'])){
  $success = "Message successfully sent";
  $first_name= $_POST['first_name'];
  $last_name= $_POST['last_name'];
  $user_name= $_POST['user_name'];
  $password= $_POST['password'];
  $role= $_POST['role'];
 
  $query ="INSERT INTO user(first_name, last_name, user_name, password, role) 
  VALUES ('$first_name','$last_name','$user_name','$password','$role')";
  mysqli_query($connect, $query);
}
?>
<div class="container">
  <form action="" method="POST">
  <div class="form-group">
    <label for="first name">First Name</label>
    <input type="text" class="form-control" name="first_name" placeholder="First name">
    
</div>
<div class="form-group">
    <label for="lat name">Last Name</label>
    <input type="text" class="form-control" name="last_name" placeholder="Last name">
</div>
<div class="form-group">
    <label for="user name">User Name</label>
    <input type="text" class="form-control" name="user_name" placeholder="user name">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
</div>
<div class="form-group">
    <label>Role</label>
    <select class="form-select" name="role" aria-label="Default select example">
        <option selected>select Role</option>
        <option value="1">admin</option>
        <option value="2">editor</option>
    </select>
</div>

<div class="mt-2">
    <button name="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>