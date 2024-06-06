<?php
include'index.php';
include'config.php';


if(isset($_POST['submit'])){
  $category_name = $_POST['category_name'];  
  $query ="INSERT INTO category(category_name)
  VALUES('$category_name')";
  mysqli_query($connect, $query);
}
?>
<div class="container mt-3">
<form action ="category.php" method="POST">
<div class="form-group">
    <label for="category name">Create category</label>
    <input type="text" class="form-control" name="category_name" placeholder="Category name">
    <button class="btn btn-primary mt-2" name="submit">Create</button>    
</div>
</form>
</div>
<div class="container">
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    
<?php 
$read = "SELECT * FROM category";
$query = mysqli_query($connect,$read);
while($row = mysqli_fetch_array($query)){?>
 
<tr>
  <td><?php echo $row["Id"];?></td>
  <td><?php echo $row["category_name"];?></td>
  <td><a class="btn btn-primary" href="update-category.php?idNo=<?php echo $row['Id'];?>">Edit</a></td>
  <td><a class="btn btn-danger" href="delete-category.php?idNo=<?php echo $row['Id'];?>">Delete</a></td>
</tr>
<?php }?>
    
  </tbody>
</table>
</div>

</div>