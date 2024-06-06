<?php
include'index.php';
include'config.php';


if(isset($_POST['submit'])){
  $post_title = $_POST['post_title'];  
  $post_description = $_POST['post_description'];  
  $query ="INSERT INTO post(post_title,post_description)
  VALUES('$post_title','$post_description')";
  mysqli_query($connect, $query);
}
?>
<div class="container mt-3">
<form action ="post.php" method="POST">
<div class="form-group">
    <label for="post name"> Post Title</label>
    <input type="text" class="form-control" name="post_title" placeholder="Post Title">
    <label for="post name">Description</label>
    <textarea class="form-control" name="post_description" rows="3"></textarea>
    <button class="btn btn-primary mt-2" name="submit">Create</button>    
</div>
</form>
</div>

<div class="container">
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Post Title</th>
      <th scope="col">Post Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    
<?php 
$read = "SELECT * FROM post";
$query = mysqli_query($connect,$read);
while($row = mysqli_fetch_array($query)){?>
 
<tr>
  <td><?php echo $row["Id"];?></td>
  <td><?php echo $row["post_title"];?></td>
  <td><?php echo $row["post_description"];?></td>
  <td><a class="btn btn-primary" href="update-category.php?idNo=<?php echo $row['Id'];?>">Edit</a></td>
  <td><a class="btn btn-danger" href="delete-post.php?idNo=<?php echo $row['Id'];?>">Delete</a></td>
</tr>
<?php }?>
    
  </tbody>
</table>
</div>