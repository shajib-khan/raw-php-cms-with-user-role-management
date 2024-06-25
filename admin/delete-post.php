<?php 
include'index.php';
include'config.php';
$id =$_GET['idNo'];
$delete = "DELETE FROM post WHERE Id = $id";
$query = mysqli_query($connect,$delete);
if($query){
    echo"<script>alert('data deleted successfully')</script>";
    header ("location:post.php");
}else{
    echo"<script>alert('data delete failed')</script>";
}
?>