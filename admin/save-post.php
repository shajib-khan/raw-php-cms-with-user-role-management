<?php
include'config.php';
session_start();
$user_id=$_SESSION['Id'];
$post_title=$_POST['post_title'];
$post_description=$_POST['post_description'];
$category_id=$_POST['category_id'];

$sql = "INSERT INTO post(post_title, post_description, user_id, category_id)
        VALUES('$post_title', '$post_description','$user_id', '$category_id' );";
$sql .="UPDATE category SET post = post +1 WHERE Id =$category_id";

if(mysqli_multi_query($connect, $sql)){
    header("location: post.php");
}else{
    echo "query failed";
}
?>