<?php 
include 'config.php';
include 'index.php';

$id =$_GET['idNo'];

$delete = "DELETE FROM user WHERE Id = $id";
$query = mysqli_query($connect,$delete);

if($query){
    
    echo"<script>alert('data deleted successfully')</script>";
    header ("location:add-user.php");
}else{
    echo"<script>alert('data delete failed')</script>";
}
?>