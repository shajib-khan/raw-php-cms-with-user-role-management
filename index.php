<?php 
include 'header.php';

?>
<div class="container mt-3">

    
<?php 
include "./admin/config.php";
$read = "SELECT * FROM post";
$query = mysqli_query($connect,$read);
while($row = mysqli_fetch_array($query)){?>



<div class="card mb-4 ">
  <div class="card-body ">
         <h2 class="card-title h4"><?php echo $row["post_title"];?></h2>
        <p class="card-text"><?php echo $row["post_description"];?></p>
     <a class="btn btn-primary" href="#!">Read more →</a>
     
</div>
 </div>
 <?php }?>

</div>
