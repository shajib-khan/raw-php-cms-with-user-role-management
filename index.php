<?php 
//include './admin/index.php';
include 'header.php';
?>
<div class="container mt-3"> 
<?php 
include "./admin/config.php";


  $query ="SELECT post.Id, post.post_title, post.post_description,post.user_id, post.category_id,
                category.category_name,user.user_name FROM post
                LEFT JOIN category ON post.category_id = category.Id
                LEFT JOIN user ON post.user_id
                ORDER BY post.Id";

$result = mysqli_query($connect,$query) or die("failed");
$count =mysqli_num_rows($result);
if ($count> 0){
  while($row = mysqli_fetch_assoc($result)){

  
?>
<div class="card mb-4 ">
  <div class="card-body ">
         <h2 class="card-title h4"><?php echo $row["post_title"]?></h2>
         <span class="text-primary"><i class="bi bi-person-fill"></i> <?php echo $row["user_name"]?></span><br>
         <span class="text-primary"><i class="bi bi-tags-fill"></i> <?php echo $row["category_name"]?></span>
        <p class="card-text"><?php echo $row["post_description"]?></p>
     <a class="btn btn-primary" href="#!">Read more →</a>  
     
</div>
 </div>
 <?php }
 }?>
  
</div>
