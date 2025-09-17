<?php
session_start();
if(!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include '../db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $content);
  $stmt->execute();
  header("Location: dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Post</title></head>
<body>
  <h2>New Post</h2>
  <form method="POST">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="content" placeholder="Content" rows="6" required></textarea><br>
    <button type="submit">Save</button>
  </form>
</body>
</html>
