<?php
include'index.php';
include'config.php';


if(isset($_POST['submit'])){
  $post_title = $_POST['post_title'];  
  $post_text = $_POST['post_text'];  
  $query ="INSERT INTO post(post_title,post_text)
  VALUES('$post_title','$post_text')";
  mysqli_query($connect, $query);
}
?>
<div class="container mt-3">
<form action ="post.php" method="POST">
<div class="form-group">
    <label for="post name"> Post Title</label>
    <input type="text" class="form-control" name="post_title" placeholder="Post Title">
    <label for="post name">Description</label>
    <textarea class="form-control" name="post_text" rows="3"></textarea>
    <button class="btn btn-primary mt-2" name="submit">Create</button>    
</div>
</form>
</div>