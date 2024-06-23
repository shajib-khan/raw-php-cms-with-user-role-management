<?php
include'header.php';
session_start();
include'./admin/config.php';

if(isset($_POST['user_name'])&&isset($_POST['password'])){
    $user_name= $_POST['user_name'];
    $password= $_POST['password'];

    if(!empty($user_name)&& !empty($password)){
        $sql ="SELECT Id FROM user WHERE user_name='$user_name' AND password='$password'";
        $sql_query = mysqli_query($connect, $sql);

        $mysqli_num_rows = mysqli_num_rows($sql_query);
        if($mysqli_num_rows){
            $_SESSION['user_name']=$mysqli_num_rows['user_name'];
            header("location:./admin/index.php");
            
        }else{
            header('login.php');
        }
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
