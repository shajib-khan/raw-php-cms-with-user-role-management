<?php
  include 'index.php';
  if(isset($_POST['submit'])){
     include 'config.php';
     
      $firstname = mysqli_real_escape_string($connection,$_POST['firstname']);                      
      $lastname = mysqli_real_escape_string($connection,$_POST['lastname']);                     
      $username = mysqli_real_escape_string ($connection,$_POST['username']);                      
      $password = mysqli_real_escape_string ($connection,$_POST['password']);                      
      $role = mysqli_real_escape_string($connection,$POST['role']);   
      
      $query ="SELECT username FROM user WHERE username='$user'";
      $result =mysqli_query($connection,$query) or die("Query Faild.");

      $count = mysqli_num_rows($result);
      if($count >0){
        echo "user name already exists.";
      }{
        $query1 = "INSERT INTO user(user_id,first_name,last_name,user_name,password,role)
        VALUE('$firstname','$lastname','$username','$password','$role')";
        $result =mysqli_query($connection,$query1) or die("Query Faild.");

        if($result){
          header("location:users.php");
        }
      }
  }
?>


<form action="<?php $_SERVER['php_self']?>" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="lname">User Name</label>
    <input type="text" id="uname" name="username" placeholder="Your user name..">

    <label for="password">password</label>
    <input type="password" id="password" name="password" placeholder="password..">

    <select class="form-control" name="role">
      <option value="0">Moderator</option>
      <option value="1">Admin</option>
    </select>
    <input type="submit" value="Submit">
  </form>

  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>