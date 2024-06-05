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