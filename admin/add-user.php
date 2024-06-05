<?php
include'index.php';
include'config.php';

if(isset($_POST['submit'])){
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
<div class="container mt-3">
<h3 class="text-center">Create User</h3>
  <form action="add-user.php" method="POST">
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

<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Password</th>
      <th scope="col">User Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
      <?php 
$read = "SELECT * FROM user";
$query = mysqli_query($connect,$read);
while($row = mysqli_fetch_array($query)){?>
 
<tr>
  <td><?php echo $row["Id"];?></td>
  <td><?php echo $row["first_name"];?></td>
  <td><?php echo $row["last_name"];?></td>
  <td><?php echo $row["user_name"];?></td>
  <td><?php echo $row["password"];?></td>
  <td><?php echo $row["role"] ;?></td>
  <td><a class="btn btn-primary" href="update-user.php?idNo=<?php echo $row['Id'];?>">Edit</a></td>
  <td><a class="btn btn-danger" href="update-user.php?idNo=<?php echo $row['Id'];?>">Delete</a></td>
</tr>
<?php }?>
    
  </tbody>
</table>

</div>