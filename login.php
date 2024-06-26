<?php
    include'header.php';
if(isset($_POST['login'])){
    include'./admin/config.php';

  $user_name= mysqli_real_escape_string($connect,$_POST['user_name']);
   $password=($_POST['password']);

   $query ="SELECT Id,user_name FROM user WHERE user_name='$user_name' AND password='$password'";
   $result =mysqli_query($connect,$query) or die("Query Failed");
   if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        session_start();
        $_SESSION['Id']=$row['Id'];
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['password']=$row['password'];
        header("location:./admin/index.php");
    }

   }else{
    echo "user name and password are not matched.";
   }
}

?>
<div class="container mt-3">
<form method="POST">
<div class="form-group">
    <label for="user name">User Name</label>
    <input type="text" class="form-control" name="user_name" placeholder="user name">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
</div>
<div class="mt-2">
    <button id="submit" name="login" class="btn btn-primary">login</button>
</div>
</form>
</div>
