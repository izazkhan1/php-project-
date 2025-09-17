<?php
session_start();
if(!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include '../db.php';
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
  <h1>Welcome, <?=$_SESSION['admin']?></h1>
  <a href="add_post.php">+ Add Post</a> | 
  <a href="logout.php">Logout</a>
  <hr>
  <?php
  $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
  while($row = $result->fetch_assoc()):
  ?>
    <div>
      <h3><?=$row['title']?></h3>
      <a href="edit_post.php?id=<?=$row['id']?>">Edit</a> | 
      <a href="delete_post.php?id=<?=$row['id']?>">Delete</a>
    </div>
  <?php endwhile; ?>
</body>
</html>
